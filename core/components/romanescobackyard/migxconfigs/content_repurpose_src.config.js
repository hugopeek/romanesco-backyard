{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Source content",
            "print_before_tabs": "0",
            "fields": [
                {
                    "MIGX_id": 1,
                    "field": "source",
                    "caption": "Link",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "superboxselect",
                    "validation": "",
                    "configs": {
                        "selectType": "resources",
                        "maxElements": "1",
                        "allowBlank": "1",
                        "depth": "0",
                        "limitRelatedContext": "false",
                        "where": "[{\"deleted:=\":\"0\"},{\"context_key:!=\":\"hub\"}]",
                        "pageSize": "20"
                    },
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
                    "field": "destination",
                    "caption": "Link",
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
                    "pos": 2
                },
                {
                    "MIGX_id": 3,
                    "field": "title",
                    "caption": "Title",
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
                    "MIGX_id": 4,
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
                    "pos": 4
                },
                {
                    "MIGX_id": 97,
                    "field": "createdby",
                    "caption": "Author",
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
                    "pos": 97
                },
                {
                    "MIGX_id": 98,
                    "field": "createdon",
                    "caption": "Date",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "date",
                    "validation": "",
                    "configs": "",
                    "restrictive_condition": "",
                    "display": "none",
                    "sourceFrom": "config",
                    "sources": "",
                    "inputOptionValues": "",
                    "default": "",
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
    "actionbuttons": "addItem||toggletrash",
    "columnbuttons": "",
    "filters": "",
    "extended": {
        "migx_add": "Add source",
        "disable_add_item": "",
        "add_items_directly": "",
        "formcaption": "",
        "update_win_title": "Edit source",
        "win_id": 21,
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
        "classname": "rmCrosslinkRepurpose",
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
        "getlistwhere": "{\"destination\":[[+resource_id]]}",
        "joins": "",
        "hooksnippets": {
            "aftersave": "migxSaveRepurposeSrc"
        },
        "cmpmaincaption": "Tool shed",
        "cmptabcaption": "Repurpose content",
        "cmptabdescription": "",
        "cmptabcontroller": "",
        "winbuttons": "",
        "onsubmitsuccess": "",
        "submitparams": ""
    },
    "columns": [
        {
            "MIGX_id": 2,
            "header": "Title",
            "dataIndex": "title",
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
            "MIGX_id": 5,
            "header": "Source",
            "dataIndex": "source",
            "width": 210,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[#[[+source]].pagetitle]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": 98,
            "header": "ID",
            "dataIndex": "id",
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