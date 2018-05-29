var fakewaffle = ( function ($, fakewaffle) {
    'use strict';

    fakewaffle.responsiveTabs = function (collapseDisplayed) {

        fakewaffle.currentPosition = 'tabs';

        var upSizes = {
            'xs': 'sm',
            'sm': 'md',
            'md': 'lg',
            'lg': 'xl',
            'xl': 'xxl'// xxl is not really exists but you may use it as a helper class
        };

        var tabGroups = $('.nav-tabs.responsive');
        var hidden = '';
        var visible = '';
        var activeTab = '';

        if (collapseDisplayed === undefined) {
            collapseDisplayed = ['sm'];
        }

        $.each(collapseDisplayed, function () {
            hidden += ' hidden-' + this + '-down';
            visible += ' hidden-' + upSizes[this] + '-up';
        });

        $.each(tabGroups, function (index) {
            var collapseDiv;
            var $tabGroup = $(this);
            var tabs = $tabGroup.find('.nav-link');

            if ($tabGroup.attr('id') === undefined) {
                $tabGroup.attr('id', 'tabs-' + index);
            }

            collapseDiv = $('<div></div>', {
                'class': 'cards-group responsive' + visible,
                'id': 'collapse-' + $tabGroup.attr('id')
            });

            $.each(tabs, function () {
                var $this = $(this);
                var oldLinkClass = $this.attr('class') === undefined ? '' : $this.attr('class');
                var newLinkClass = 'accordion-toggle';
                var oldParentClass = $this.parent().attr('class') === undefined ? '' : $this.parent().attr('class');
                var newParentClass = 'card';
                var newHash = $this.get(0).hash.replace('#', 'collapse-');

                if (oldLinkClass.length > 0) {
                    newLinkClass += ' ' + oldLinkClass;
                }

                if (oldParentClass.length > 0) {
                    oldParentClass = oldParentClass.replace(/\bactive\b/g, '');
                    newParentClass += ' ' + oldParentClass;
                    newParentClass = newParentClass.replace(/\s{2,}/g, ' ');
                    newParentClass = newParentClass.replace(/^\s+|\s+$/g, '');
                }

                if ($this.parent().hasClass('active')) {
                    activeTab = '#' + newHash;
                }

                collapseDiv.append(
                    $('<div>').attr('class', newParentClass).html(
                        $('<div>').attr('class', 'card-header').html(
                            $('<h5>').attr('class', 'mb-0').html(
                                $('<a>', {
                                    'class': newLinkClass,
                                    'data-toggle': 'collapse',
                                    'data-parent': '#collapse-' + $tabGroup.attr('id'),
                                    'href': '#' + newHash,
                                    'html': $this.html()
                                })
                            )
                        )
                    ).append(
                        $('<div>', {
                            'id': newHash,
                            'class': 'collapse'
                        })
                    )
                );
            });

            $tabGroup.next().after(collapseDiv);
            $tabGroup.addClass(hidden);
            $('.tab-content.responsive').addClass(hidden);

            if (activeTab) {
                $(activeTab).collapse('show');
            }
        });

        fakewaffle.checkResize();
        fakewaffle.bindTabToCollapse();
    };

    fakewaffle.checkResize = function () {

        if ($('.cards-group.responsive').is(':visible') === true && fakewaffle.currentPosition === 'tabs') {
            fakewaffle.tabToPanel();
            fakewaffle.currentPosition = 'panel';
        } else if ($('.cards-group.responsive').is(':visible') === false && fakewaffle.currentPosition === 'panel') {
            fakewaffle.panelToTab();
            fakewaffle.currentPosition = 'tabs';
        }

    };

    fakewaffle.tabToPanel = function () {

        var tabGroups = $('.nav-tabs.responsive');

        $.each(tabGroups, function (index, tabGroup) {

            // Find the tab
            var tabContents = $(tabGroup).next('.tab-content').find('.tab-pane');

            $.each(tabContents, function (index, tabContent) {
                // Find the id to move the element to
                var destinationId = $(tabContent).attr('id').replace(/^/, '#collapse-');

                // Convert tab to panel and move to destination
                $(tabContent)
                    .removeClass('tab-pane')
                    .addClass('card-block fw-previous-tab-pane')
                    .appendTo($(destinationId));

            });

        });

    };

    fakewaffle.panelToTab = function () {

        var panelGroups = $('.cards-group.responsive');

        $.each(panelGroups, function (index, panelGroup) {

            var destinationId = $(panelGroup).attr('id').replace('collapse-', '#');
            var destination = $(destinationId).next('.tab-content')[0];

            // Find the panel contents
            var panelContents = $(panelGroup).find('.card-block.fw-previous-tab-pane');

            // Convert to tab and move to destination
            panelContents
                .removeClass('card-block fw-previous-tab-pane')
                .addClass('tab-pane')
                .appendTo($(destination));

        });

    };

    fakewaffle.bindTabToCollapse = function () {

        var tabs = $('.nav-tabs.responsive').find('li a');
        var collapse = $('.cards-group.responsive').find('.collapse');

        // Toggle the panels when the associated tab is toggled
        tabs.on('shown.bs.tab', function (e) {

            if (fakewaffle.currentPosition === 'tabs') {
                var $current = $(e.currentTarget.hash.replace(/#/, '#collapse-'));
                $current.collapse('show');

                if (e.relatedTarget) {
                    var $previous = $(e.relatedTarget.hash.replace(/#/, '#collapse-'));
                    $previous.collapse('hide');
                }
            }

        });

        // Toggle the tab when the associated panel is toggled
        collapse.on('shown.bs.collapse', function (e) {

            if (fakewaffle.currentPosition === 'panel') {
                // Activate current tabs
                var current = $(e.target).context.id.replace(/collapse-/g, '#');
                $('a[href="' + current + '"]').tab('show');

                // Update the content with active
                var panelGroup = $(e.currentTarget).closest('.cards-group.responsive');
                $(panelGroup).find('.card-block').removeClass('active');
                $(e.currentTarget).find('.card-block').addClass('active');
            }

        });
    };

    $(window).resize(function () {
        fakewaffle.checkResize();
    });

    return fakewaffle;
}(window.jQuery, fakewaffle || {}) );
