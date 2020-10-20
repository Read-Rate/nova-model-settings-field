Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-model-settings-field',
            path: '/nova-model-settings-field',
            component: require('./components/ModelSettingsField'),
        },
    ]);
    Vue.component('index-nova-model-settings-field', require('./components/Nova/IndexField'));
    Vue.component('detail-nova-model-settings-field', require('./components/Nova/DetailField'));
    Vue.component('form-nova-model-settings-field', require('./components/Nova/FormField'));
});
