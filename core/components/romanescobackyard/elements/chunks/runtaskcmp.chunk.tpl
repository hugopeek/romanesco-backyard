<div class="container">
    <h2 class="modx-page-header">[[+ph._pagetitle]]</h2>

    <div class="x-panel-body shadowbox">
        <div class="panel-desc">Execute specific command for selected context. Remember: with great power comes great responsibility!</div>

        <div class="x-panel main-wrapper chunkOutput">
            <select name="task" id="task" class="ui selection dropdown">
                <option value="">--- Choose task ---</option>
                <option value="css">Generate CSS</option>
                <option value="criticals">Generate critical CSS</option>
                <option value="favicons">Generate favicons</option>
            </select>

            <span>for context</span>

            <select name="context" id="context" class="ui selection dropdown">
                <option value="">--- select context ---</option>
                [[pdoResources?
                    &class=`modContext`
                    &sortby=`rank`
                    &sortdir=`ASC`
                    &limit=`0`
                    &tpl=`@INLINE <option value="[[+key]]">[[+name]]</option>`
                ]]
            </select>

            <span>=></span>

            [[-
            <label id="option" for="schedule">
                <input type="checkbox" id="schedule" name="schedule" value="1" />
                Schedule
            </label>
            ]]

            <button id="button-generate"
                    class="x-btn primary-button"
                    type="submit"
                    onclick="return runTask()">
                Generate
            </button>

            <div class="ui hidden divider"></div>

            <label for="output" class="meta">Output:</label>
            <textarea id="output" class="x-form-textarea x-form-field" disabled></textarea>
        </div>
    </div>
</div>