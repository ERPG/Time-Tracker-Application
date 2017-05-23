<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="stylesheets/scss/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Orbitron|Plaster" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Time Tracker App</h1>

            <div class="clock">
                <span id="chronotime">0:00:00:00</span>
            </div>

            <div class="form">
                <form id="request" action="" method="POST" name="chronoForm">

                    <div class="inputContainer">
                        <label>Insert task</label>
                        <input id="inputTask" type="text" name="task" placeholder="Here...">
                    </div>

                    <div class="buttonsContainer">

                        <input class="start" type="button" name="startstop" value="add Task!" onClick="chronoStart()" />

                        <input class="stop" type="button" name="startstop" value="Task Ready!" onClick="chronoStop()" />

                        <input class="reset" type="button" name="reset" value="reset!" onClick="chronoReset()" />

                        <input type="hidden" name="timer" value=""/>
                        <input type="hidden" name="taskHidden" value=""/>
                    </div>
                </form>
            </div>
            
            <div class="tableContainer">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Assigment</th>
                            <th>Time(H:M:S)</th>
                        </tr>
                    </thead>
                    <tbody id="taskDone">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <script src="js/index.js"></script>
    </body>
</html>