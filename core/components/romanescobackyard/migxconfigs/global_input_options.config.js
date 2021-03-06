{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Input option",
            "print_before_tabs": "0",
            "fields": [
                {
                    "MIGX_id": 1,
                    "field": "name",
                    "caption": "Name",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "text",
                    "validation": "required",
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
                    "field": "description",
                    "caption": "Description",
                    "description": "",
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
                    "pos": 2
                },
                {
                    "MIGX_id": 2,
                    "field": "alias",
                    "caption": "Alias",
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
                    "pos": 3
                },
                {
                    "MIGX_id": 97,
                    "field": "key",
                    "caption": "Key",
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
                    "default": "0",
                    "useDefaultIfEmpty": "0",
                    "pos": 97
                },
                {
                    "MIGX_id": 98,
                    "field": "group",
                    "caption": "Group",
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
                    "default": "0",
                    "useDefaultIfEmpty": "0",
                    "pos": 98
                },
                {
                    "MIGX_id": 99,
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
                    "pos": 99
                }
            ],
            "pos": 1
        }
    ],
    "contextmenus": "update||duplicate||recall_remove_delete",
    "actionbuttons": "addItem||bulk||toggletrash||emptyTrash",
    "columnbuttons": "",
    "filters": "",
    "extended": {
        "migx_add": "Add option",
        "disable_add_item": "",
        "add_items_directly": "",
        "formcaption": "",
        "update_win_title": "Edit option",
        "win_id": 4,
        "maxRecords": "",
        "addNewItemAt": "top",
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
        "classname": "rmOption",
        "task": "",
        "getlistsort": "position",
        "getlistsortdir": "ASC",
        "sortconfig": "",
        "gridpagesize": 20,
        "use_custom_prefix": "0",
        "prefix": "",
        "grid": "",
        "gridload_mode": 2,
        "check_resid": 0,
        "check_resid_TV": "",
        "join_alias": "",
        "has_jointable": "no",
        "getlistwhere": "{\"group\":[[+object_id]]}",
        "joins": [
            {
                "alias": "Group"
            }
        ],
        "hooksnippets": {
            "aftersave": "migxSaveOption"
        },
        "cmpmaincaption": "Tool shed",
        "cmptabcaption": "Input options",
        "cmptabdescription": "",
        "cmptabcontroller": "",
        "winbuttons": "",
        "onsubmitsuccess": "",
        "submitparams": ""
    },
    "columns": [
        {
            "MIGX_id": 1,
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
            "editor": ""
        },
        {
            "MIGX_id": 2,
            "header": "Name",
            "dataIndex": "name",
            "width": 80,
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
            "MIGX_id": 3,
            "header": "Description",
            "dataIndex": "description",
            "width": 130,
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
            "MIGX_id": 4,
            "header": "Alias",
            "dataIndex": "alias",
            "width": 80,
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
            "MIGX_id": 5,
            "header": "Position",
            "dataIndex": "position",
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
            "MIGX_id": 99,
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