imageRenderer = function(value, metaData, record, rowIndex, colIndex, store) {
    if (value != '' && value != null) {
        return '<div class="imageRenderer"><img src="' + value + '" style="max-width:100%;height:auto;"></div>';
    }
}
imageRendererTestimonialCompany = function(value, metaData, record, rowIndex, colIndex, store) {
    //if (value != '' && value != null) {
    //    var baseUrl = MODx.config.default_site_url + "testimonials/companies/";
    //    if (value.indexOf('http://') === 0) {
    //        baseUrl = '';
    //    }
    //    return '<div class="imageRendererTestimonialCompany"><img src="' + baseUrl + value + '" width="100"></div>';
    //}
    if (value == null ) return '';
    if (!value.length) return '';
    var data = JSON.parse(value);
    var url = ImagePlus.generateThumbUrl({
        src: data.sourceImg.src,
        source: data.sourceImg.source,
        sw: data.crop.width,
        sh: data.crop.height,
        sx: data.crop.x,
        sy: data.crop.y
    })
    return '<div class="imageRendererTestimonialCompany"><img src="' + url + '" style="max-width:100%; height:auto;" /></div>';
}
imageRendererTestimonialPerson = function(value, metaData, record, rowIndex, colIndex, store) {
    if (value != '' && value != null) {
        var baseUrl = MODx.config.default_site_url + "testimonials/persons/";
        if (value.indexOf('http://') === 0) {
            baseUrl = '';
        }
        return '<div class="imageRendererTestimonialPerson"><img src="' + baseUrl + value + '" width="100"></div>';
    }
}
imageRendererTeam = function(value, metaData, record, rowIndex, colIndex, store) {
    if (value != '' && value != null) {
        var baseUrl = MODx.config.default_site_url + "team/";
        if (value.indexOf('http://') === 0) {
            baseUrl = '';
        }
        return '<div class="imageRendererTeam"><img src="' + baseUrl + value + '" width="100"></div>';
    }
}

// Default boolean renderer doesn't always process 0 values correctly
booleanRenderer = function(value, metaData, record, rowIndex, colIndex, store) {
    var iconclass = (value != 0) ? 'icon-check' : 'icon-times';
    return '<div style="text-align:center;"><i class="icon ' + iconclass + '"></i></div>';
}

// Default boolean is counterintuitive for indicating hidden resources
booleanRendererVisibility = function(value, metaData, record, rowIndex, colIndex, store) {
    var iconclass = (value != 0) ? 'icon-ban' : 'icon-eye';
    return '<div style="text-align:center;"><i class="icon ' + iconclass + '"></i></div>';
}

// Correctly store 0 values with rm-combo-boolean editor
collections.combo.rmExtendedBoolean = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        store: new Ext.data.SimpleStore({
            fields: ['d','v']
            ,data: [
                [_('yes'),1]
                ,[_('no'),0]
            ]
        })
        ,displayField: 'd'
        ,valueField: 'v'
        ,mode: 'local'
        ,triggerAction: 'all'
        ,editable: false
        ,selectOnFocus: false
        ,preventRender: true
        ,forceSelection: true
        ,enableKeyEvents: true
    });
    collections.combo.rmExtendedBoolean.superclass.constructor.call(this,config);
};
Ext.extend(collections.combo.rmExtendedBoolean,MODx.combo.ComboBox);
Ext.reg('rm-combo-boolean',collections.combo.rmExtendedBoolean);

// Correctly store hidemenu values with rm-visibility-boolean editor
collections.combo.rmVisibilityBoolean = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        store: new Ext.data.SimpleStore({
            fields: ['d','v']
            ,data: [
                ['Hidden',1]
                ,['Visible',0]
            ]
        })
        ,displayField: 'd'
        ,valueField: 'v'
        ,mode: 'local'
        ,triggerAction: 'all'
        ,editable: false
        ,selectOnFocus: false
        ,preventRender: true
        ,forceSelection: true
        ,enableKeyEvents: true
    });
    collections.combo.rmVisibilityBoolean.superclass.constructor.call(this,config);
};
Ext.extend(collections.combo.rmVisibilityBoolean,MODx.combo.ComboBox);
Ext.reg('rm-visibility-boolean',collections.combo.rmVisibilityBoolean);
