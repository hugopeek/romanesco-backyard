var topic = {
    overviews: "/getcache/cache/partition/refresh/gallery/"
};

this.console = MODx.load({
    xtype: 'modx-console'
    ,register: 'mgr'
    ,topic: topic
    ,show_filename: 0
});

this.console.show(Ext.getBody());

MODx.Ajax.request({
    url: MODx.config.assets_url+'components/getcache/connector.php'
    ,params: { action: 'cache/partition/refresh', partitions: 'gallery', register: 'mgr' , topic: topic }
    ,listeners: {
        'success':{fn:function() {
            this.console.fireEvent('complete');
        },scope:this}
    }
});

// noinspection JSAnnotator
return false;