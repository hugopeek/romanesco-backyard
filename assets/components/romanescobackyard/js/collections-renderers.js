var imageRenderer = function(value, metaData, record, rowIndex, colIndex, store) {
    if (value != '' && value != null) {
        return '<div class="imageRenderer"><img src="' + value + '" style="max-width:100%;height:auto;"></div>';
    }
}
var imageRendererTestimonialCompany = function(value, metaData, record, rowIndex, colIndex, store) {
    //if (value != '' && value != null) {
    //    var baseUrl = MODx.config.default_site_url + "testimonials/companies/";
    //    if (value.indexOf('http://') === 0) {
    //        baseUrl = '';
    //    }
    //    return '<div class="imageRendererTestimonialCompany"><img src="' + baseUrl + value + '" width="100"></div>';
    //}
    if (value == null || value == undefined ) return '';
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
var imageRendererTestimonialPerson = function(value, metaData, record, rowIndex, colIndex, store) {
    if (value != '' && value != null) {
        var baseUrl = MODx.config.default_site_url + "testimonials/persons/";
        if (value.indexOf('http://') === 0) {
            baseUrl = '';
        }
        return '<div class="imageRendererTestimonialPerson"><img src="' + baseUrl + value + '" width="100"></div>';
    }
}
var imageRendererTeam = function(value, metaData, record, rowIndex, colIndex, store) {
    if (value != '' && value != null) {
        var baseUrl = MODx.config.default_site_url + "team/";
        if (value.indexOf('http://') === 0) {
            baseUrl = '';
        }
        return '<div class="imageRendererTeam"><img src="' + baseUrl + value + '" width="100"></div>';
    }
}

var booleanRenderer = function(value, metaData, record, rowIndex, colIndex, store) {
    var iconclass = (value != 0) ? 'icon-check' : 'icon-times';
    return '<div style="text-align:center;"><i class="icon ' + iconclass + '"></i></div>';
}

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
