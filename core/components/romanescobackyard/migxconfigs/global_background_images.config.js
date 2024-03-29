{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Select image",
            "print_before_tabs": "0",
            "pos": 1,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "background_img",
                    "caption": "Background image",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "overview_img_pano",
                    "inputTVtype": "",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "migx",
                    "sources": [
                        {
                            "MIGX_id": 1,
                            "context": "mgr",
                            "sourceid": 13
                        },
                        {
                            "MIGX_id": 2,
                            "context": "web",
                            "sourceid": 13
                        }
                    ],
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "background_img_portrait",
                    "caption": "Background image (portrait)",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "overview_img_portrait",
                    "inputTVtype": "",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "migx",
                    "sources": [
                        {
                            "MIGX_id": "",
                            "context": "mgr",
                            "sourceid": 13
                        },
                        {
                            "MIGX_id": "",
                            "context": "web",
                            "sourceid": 13
                        }
                    ],
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "background_title",
                    "caption": "Background title",
                    "description": "Give this background a descriptive name, so you'll remember its contents when referenced elsewhere. Try to keep it short!",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                }
            ]
        },
        {
            "MIGX_id": 2,
            "caption": "Select SVG",
            "print_before_tabs": "0",
            "pos": 2,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "background_svg",
                    "caption": "Background SVG",
                    "description": "As an alternative to a regular JPG or PNG image, you can also select an SVG for background usage. SVGs are great for creating scalable or pattern backgrounds, but they may need some extra adjustments still with CSS.",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "image",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "migx",
                    "sources": [
                        {
                            "MIGX_id": 1,
                            "context": "web",
                            "sourceid": 13
                        },
                        {
                            "MIGX_id": 2,
                            "context": "mgr",
                            "sourceid": 13
                        },
                        {
                            "MIGX_id": 3,
                            "context": "global",
                            "sourceid": 13
                        }
                    ],
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                }
            ]
        },
        {
            "MIGX_id": 3,
            "caption": "Additional settings",
            "print_before_tabs": "0",
            "pos": 3,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "background_inverted",
                    "caption": "Invert background",
                    "description": "Set to \"yes\" if you want the content to appear in white on this background.",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "option",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "Yes==1||No==0",
                    "default": "0",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "background_color",
                    "caption": "Background color",
                    "description": "You can enter any valid CSS value here, such as hex value (including # symbol) or rgba.",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "text",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "background_opacity",
                    "caption": "Image opacity",
                    "description": "You can fade the image with this setting, so the background color will come through. Enter a value between 0 and 100.",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "number",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                }
            ]
        }
    ],
    "contextmenus": "",
    "actionbuttons": "",
    "columnbuttons": "",
    "filters": "",
    "extended": {
        "migx_add": "Add background image",
        "disable_add_item": 1,
        "add_items_directly": "",
        "formcaption": "",
        "update_win_title": "Manage global background images",
        "win_id": 2,
        "maxRecords": "",
        "addNewItemAt": "bottom",
        "multiple_formtabs": "",
        "multiple_formtabs_label": "",
        "multiple_formtabs_field": "",
        "multiple_formtabs_optionstext": "",
        "multiple_formtabs_optionsvalue": "",
        "actionbuttonsperrow": 4,
        "winbuttonslist": "",
        "extrahandlers": "this.handleColumnSwitch",
        "filtersperrow": 4,
        "packageName": "",
        "classname": "",
        "task": "",
        "getlistsort": "",
        "getlistsortdir": "",
        "sortconfig": "",
        "gridpagesize": "",
        "use_custom_prefix": "0",
        "prefix": "",
        "grid": "",
        "gridload_mode": 1,
        "check_resid": 1,
        "check_resid_TV": "",
        "join_alias": "",
        "has_jointable": "yes",
        "getlistwhere": "",
        "joins": "",
        "hooksnippets": "",
        "cmpmaincaption": "",
        "cmptabcaption": "",
        "cmptabdescription": "",
        "cmptabcontroller": "",
        "winbuttons": "",
        "onsubmitsuccess": "",
        "submitparams": ""
    },
    "columns": [
        {
            "MIGX_id": "",
            "header": "Image",
            "dataIndex": "background_img",
            "width": 50,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "ImagePlus.MIGX_Renderer",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Title",
            "dataIndex": "background_title",
            "width": 60,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },
        {
            "MIGX_id": "",
            "header": "Background",
            "dataIndex": "background_color",
            "width": 40,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },
        {
            "MIGX_id": "",
            "header": "Opacity",
            "dataIndex": "background_opacity",
            "width": 40,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },
        {
            "MIGX_id": "",
            "header": "Inverted",
            "dataIndex": "background_inverted",
            "width": 30,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderSwitchStatusOptions",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": [
                {
                    "MIGX_id": "",
                    "name": "inactive",
                    "use_as_fallback": 1,
                    "value": "0",
                    "clickaction": "",
                    "handler": "",
                    "image": "assets\/semantic\/dist\/themes\/romanesco\/assets\/icons\/square-o.svg"
                },
                {
                    "MIGX_id": "",
                    "name": "active",
                    "use_as_fallback": "",
                    "value": 1,
                    "clickaction": "",
                    "handler": "",
                    "image": "assets\/semantic\/dist\/themes\/romanesco\/assets\/icons\/check-square-o.svg"
                },
                {
                    "MIGX_id": "",
                    "name": "inactive",
                    "use_as_fallback": "",
                    "value": "",
                    "clickaction": "",
                    "handler": "",
                    "image": "assets\/semantic\/dist\/themes\/romanesco\/assets\/icons\/square-o.svg"
                }
            ],
            "editor": ""
        }
    ]
}