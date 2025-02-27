{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Properties",
            "print_before_tabs": "0",
            "pos": 1,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "id",
                    "caption": "ID",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "number",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "context",
                    "caption": "Context",
                    "description": "If set, this connection will only be available in given context.",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "text",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "name",
                    "caption": "Name",
                    "description": "Brand name of this platform.",
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
                    "field": "url",
                    "caption": "URL",
                    "description": "Full URL, including https://. Feel free to use placeholders or snippets here.",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "textarea",
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
                    "field": "title",
                    "caption": "Title",
                    "description": "Optional. HTML title, visible on hover.",
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
                    "field": "icon",
                    "caption": "Icon class(es)",
                    "description": "Optional. Uses the brand name by default.",
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
                    "field": "active",
                    "caption": "Active",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "number",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "pos",
                    "caption": "Position",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "deleted",
                    "caption": "Deleted",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
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
    "contextmenus": "update||duplicate||recall_remove_delete",
    "actionbuttons": "addItem||toggletrash||emptyTrash",
    "columnbuttons": "",
    "filters": [
        {
            "MIGX_id": 1,
            "name": "search_share",
            "label": "Search",
            "emptytext": "Search",
            "type": "textbox",
            "getlistwhere": {
                "name:LIKE": "%[[+search_share]]%",
                "OR:title:LIKE": "%[[+search_share]]%",
                "OR:url:LIKE": "%[[+search_share]]%",
                "OR:context:LIKE": "%[[+search_share]]%"
            },
            "getcomboprocessor": "",
            "combotextfield": "",
            "comboidfield": "",
            "combowhere": "",
            "comboclassname": "",
            "combopackagename": "",
            "combo_use_custom_prefix": "0",
            "comboprefix": "",
            "combojoins": "",
            "comboparent": "",
            "default": ""
        },
        {
            "MIGX_id": 2,
            "name": "filter_sharing",
            "label": "Filter",
            "emptytext": "All contexts",
            "type": "combobox",
            "getlistwhere": "",
            "getcomboprocessor": "getcombo",
            "combotextfield": "context",
            "comboidfield": "key",
            "combowhere": "",
            "comboclassname": "modContext",
            "combopackagename": "",
            "combo_use_custom_prefix": "0",
            "comboprefix": "modx_",
            "combojoins": "",
            "comboparent": "",
            "default": ""
        }
    ],
    "extended": {
        "migx_add": "Add platform",
        "disable_add_item": "",
        "add_items_directly": "",
        "formcaption": "",
        "update_win_title": "Edit platform",
        "win_id": "social_sharing",
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
        "packageName": "romanescobackyard",
        "classname": "rmSocialShare",
        "task": "",
        "getlistsort": "",
        "getlistsortdir": "",
        "sortconfig": "",
        "gridpagesize": "",
        "use_custom_prefix": "0",
        "prefix": "",
        "grid": "",
        "gridload_mode": 1,
        "check_resid": 0,
        "check_resid_TV": "",
        "join_alias": "",
        "has_jointable": "no",
        "getlistwhere": "",
        "joins": "",
        "hooksnippets": "",
        "cmpmaincaption": "Project data",
        "cmptabcaption": "Social sharing",
        "cmptabdescription": "Maintain a list of social media platforms through which visitors can share your content.",
        "cmptabcontroller": "",
        "winbuttons": "",
        "onsubmitsuccess": "",
        "submitparams": ""
    },
    "columns": [
        {
            "MIGX_id": "",
            "header": "ID",
            "dataIndex": "id",
            "width": 10,
            "sortable": true,
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
            "header": "Platform",
            "dataIndex": "name",
            "width": 30,
            "sortable": true,
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
            "header": "URL",
            "dataIndex": "url",
            "width": 80,
            "sortable": "",
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
            "header": "Title",
            "dataIndex": "title",
            "width": 50,
            "sortable": "",
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
            "header": "Icon",
            "dataIndex": "icon",
            "width": 10,
            "sortable": "",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "<div class=\"chunkOutput\"><i class=\"ui [[+icon:empty=`[[+name:lcase]]`]] icon\"></div>",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Context",
            "dataIndex": "context",
            "width": 30,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Active",
            "dataIndex": "active",
            "width": 10,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderSwitchStatusOptions",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": [
                {
                    "MIGX_id": 1,
                    "name": "No",
                    "use_as_fallback": 1,
                    "value": "0",
                    "clickaction": "",
                    "handler": "",
                    "image": "assets\/semantic\/dist\/themes\/romanesco\/assets\/icons\/square-o.svg"
                },
                {
                    "MIGX_id": 2,
                    "name": "Yes",
                    "use_as_fallback": "",
                    "value": 1,
                    "clickaction": "",
                    "handler": "",
                    "image": "assets\/semantic\/dist\/themes\/romanesco\/assets\/icons\/check-square-o.svg"
                },
                {
                    "MIGX_id": 3,
                    "name": "No",
                    "use_as_fallback": "",
                    "value": "0",
                    "clickaction": "",
                    "handler": "",
                    "image": "assets\/semantic\/dist\/themes\/romanesco\/assets\/icons\/square-o.svg"
                }
            ],
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "deleted",
            "dataIndex": "deleted",
            "width": 10,
            "sortable": true,
            "show_in_grid": 0,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        }
    ],
    "category": ""
}