<script>
    function runTask() {
        const task = document.getElementById('task').value;
        const context = document.getElementById('context').value;
        //const scheduleTask = document.querySelector('#schedule').checked;
        const generateButton = document.getElementById('button-generate');
        const textArea = document.getElementById('output');

        if (!context) {
            textArea.value = "Je moet natuurlijk wel een context selecteren he ;)";
            return false;
        }

        // Schedule task
        // let schedule = 0;
        // if (scheduleTask === true) {
        //     schedule = 1;
        // }

        // Open portal and run processor
        let source = new EventSource(`[[+connector_url]]&task=${task}&context=${context}`);

        // Disable deploy button
        generateButton.classList.add('x-item-disabled');
        generateButton.disabled = true;

        source.onopen = function() {
            console.log("Connection established.");
            textArea.value = '';
        };

        source.addEventListener('message', function(e) {
            //console.log(e.data);
            if (e.data !== '') {
                textArea.value += e.data + '\n';
                textArea.scrollTop = textArea.scrollHeight;
            }
        }, false);

        source.addEventListener('error', function(e) {
            console.log("Connection closed.");
            source.close();

            generateButton.classList.remove('x-item-disabled');
            generateButton.disabled = false;
        }, false);

        return false;
    }
</script>