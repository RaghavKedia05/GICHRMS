(function (window) {
    'use strict';

    window.GicProductTourSteps = function (options) {
        const appName = options.appName || 'GICHRMS';
        return [
            {
                title: 'Welcome to ' + appName + '!',
                description: 'Let\u2019s take a quick tour and show you how everything works.',
                selector: null
            },
            {
                title: 'Main Navigation',
                description: 'Use this menu to access the main sections of your workspace.',
                selector: '[data-tour="sidebar"]',
                open: 'sidebar'
            },
            {
                title: 'Open Your Companies',
                description: 'Use this primary action to view and manage companies in your workspace.',
                selector: '[data-tour="create-button"]'
            },
            {
                title: 'Track Your Progress',
                description: 'View your latest activity, statistics and important updates here.',
                selector: '[data-tour="dashboard-overview"]'
            },
            {
                title: 'Stay Updated',
                description: 'Important alerts and updates will appear here.',
                selector: '[data-tour="notifications"]'
            },
            {
                title: 'Manage Your Account',
                description: 'Update your profile, preferences and account settings from here.',
                selector: '[data-tour="profile-menu"]'
            }
        ];
    };
})(window);
