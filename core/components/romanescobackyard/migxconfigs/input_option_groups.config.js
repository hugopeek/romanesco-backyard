{
    "formtabs": [
        {
            "MIGX_id": 1,
            "caption": "Options",
            "print_before_tabs": "0",
            "pos": 1,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "options",
                    "caption": "Options",
                    "description": "",
                    "description_is_code": "0",
                    "inputTV": "",
                    "inputTVtype": "migxdb",
                    "validation": "",
                    "configs": "input_options:romanescobackyard",
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
            "caption": "Group",
            "print_before_tabs": "0",
            "pos": 2,
            "fields": [
                {
                    "MIGX_id": "",
                    "field": "name",
                    "caption": "Name",
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
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "key",
                    "caption": "Key",
                    "description": "This identifier will be used by the TV to fetch the options. Don't use spaces.",
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
                    "pos": ""
                },
                {
                    "MIGX_id": "",
                    "field": "pos",
                    "caption": "Position",
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
                    "default": 0,
                    "useDefaultIfEmpty": "0",
                    "pos": ""
                },
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
                }
            ]
        }
    ],
    "contextmenus": "update||duplicate||recall_remove_delete",
    "actionbuttons": "addItem||bulk||toggletrash||emptyTrash",
    "columnbuttons": "",
    "filters": "",
    "extended": {
        "migx_add": "Add group",
        "disable_add_item": "",
        "add_items_directly": 1,
        "formcaption": "",
        "update_win_title": "Edit group",
        "win_id": 5,
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
        "classname": "rmOptionGroup",
        "task": "",
        "getlistsort": "pos",
        "getlistsortdir": "ASC",
        "sortconfig": "",
        "gridpagesize": "",
        "use_custom_prefix": "0",
        "prefix": "",
        "grid": "dragdrop",
        "gridload_mode": 1,
        "check_resid": 0,
        "check_resid_TV": "",
        "join_alias": "",
        "has_jointable": "no",
        "getlistwhere": "",
        "joins": "",
        "hooksnippets": {
            "aftersave": "migxSaveOptionGroup"
        },
        "cmpmaincaption": "Project data",
        "cmptabcaption": "Input options",
        "cmptabdescription": "These groups contain options that can be used throughout the platform, in selectors and checkboxes and such. They are similar to tags, but can contain a little more information.",
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
            "editor": ""
        },
        {
            "MIGX_id": "",
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
            "MIGX_id": "",
            "header": "Key",
            "dataIndex": "key",
            "width": 50,
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
            "header": "Description",
            "dataIndex": "description",
            "width": 130,
            "sortable": false,
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
            "header": "Options",
            "dataIndex": "options",
            "width": 130,
            "sortable": true,
            "show_in_grid": 1,
            "customrenderer": "",
            "renderer": "this.renderChunk",
            "clickaction": "",
            "selectorconfig": "",
            "renderchunktpl": "[[migxLoopCollection?\n&packageName=`romanescobackyard`\n&classname=`rmOption`\n&where=`[{\"group\":\"[[+id]]\"},{\"deleted:=\":0}]`\n&sortConfig=`[{\"sortby\":\"pos\",\"sortdir\":\"ASC\"}]`\n&tpl=`rawName`\n&outputSeparator=`<br>`\n]]",
            "renderoptions": "",
            "editor": ""
        },
        {
            "MIGX_id": "",
            "header": "Sort",
            "dataIndex": "pos",
            "width": 30,
            "sortable": true,
            "show_in_grid": 0,
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