{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Content",
            "print_before_tabs": "0",
            "fields": [
                {
                    "MIGX_id": 1,
                    "field": "date",
                    "caption": "Date stamp",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "date",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": 1
                },
                {
                    "MIGX_id": 2,
                    "field": "title",
                    "caption": "Entry title",
                    "description": "",
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
                    "pos": 2
                },
                {
                    "MIGX_id": 3,
                    "field": "description",
                    "caption": "Description",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "richtext",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
                    "useDefaultIfEmpty": "0",
                    "pos": 3
                }
            ],
            "pos": 1
        },
        {
            "MIGX_id": 2,
            "caption": "Properties",
            "print_before_tabs": "0",
            "fields": [
                {
                    "MIGX_id": 4,
                    "field": "id",
                    "caption": "Entry ID",
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
                    "pos": 1
                },
                {
                    "MIGX_id": 5,
                    "field": "type",
                    "caption": "Timeline type",
                    "description": "",
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
                    "default": "project-hub",
                    "useDefaultIfEmpty": "0",
                    "pos": 2
                },
                {
                    "MIGX_id": 6,
                    "field": "icon",
                    "caption": "Icon",
                    "description": "This icon will be displayed in the timeline marker.",
                    "description_is_code": "0",
                    "inputTV": "overview_icon_font",
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
                    "pos": 3
                },
                {
                    "MIGX_id": 7,
                    "field": "complexity",
                    "caption": "Complexity",
                    "description": "Indicate how much effort this milestone will take, in points.",
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
                    "pos": 4
                }
            ],
            "pos": 2
        }
    ],
    "contextmenus": "update||duplicate||recall_remove_delete",
    "actionbuttons": "addItem||toggletrash",
    "columnbuttons": "",
    "filters": "",
    "extended": {
        "migx_add": "Add entry",
        "disable_add_item": "",
        "add_items_directly": "",
        "formcaption": "",
        "update_win_title": "Edit timeline entry",
        "win_id": 1,
        "maxRecords": "",
        "addNewItemAt": "bottom",
        "multiple_formtabs": "",
        "multiple_formtabs_label": "",
        "multiple_formtabs_field": "",
        "multiple_formtabs_optionstext": "",
        "multiple_formtabs_optionsvalue": "",
        "actionbuttonsperrow": 4,
        "winbuttonslist": "",
        "extrahandlers": "",
        "filtersperrow": 4,
        "packageName": "romanescobackyard",
        "classname": "rmTimeline",
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
        "cmpmaincaption": "Toolshed",
        "cmptabcaption": "Toolshed",
        "cmptabdescription": "",
        "cmptabcontroller": "",
        "winbuttons": "",
        "onsubmitsuccess": "",
        "submitparams": ""
    },
    "columns": [
        {
            "MIGX_id": 1,
            "header": "Date",
            "dataIndex": "date",
            "width": 50,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderDate",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": 2,
            "header": "Title",
            "dataIndex": "title",
            "width": 80,
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
            "MIGX_id": 3,
            "header": "Description",
            "dataIndex": "description",
            "width": 120,
            "sortable": "false",
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": "this.textEditor"
        },{
            "MIGX_id": 4,
            "header": "Complexity",
            "dataIndex": "complexity",
            "width": 30,
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
            "MIGX_id": 5,
            "header": "ID",
            "dataIndex": "id",
            "width": "",
            "sortable": "false",
            "show_in_grid": "0",
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": 6,
            "header": "deleted",
            "dataIndex": "deleted",
            "width": "",
            "sortable": "false",
            "show_in_grid": "0",
            "customrenderer": "",
            "renderer": "",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "",
            "renderoptions": "",
            "editor": ""
        }
    ]
}