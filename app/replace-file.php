<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conditionize Basic Usage Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../conditionize.flexible.jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.conditional').conditionize();
        });
    </script>
    <style type="text/css">.msg {
            color: red;
        }</style>
</head>
<body>
<p><label><input type="checkbox" id="example1"> Are you sure?</label></p>
<p class="conditional" data-condition="#example1">
    <label><input type="checkbox" name="example2"> Really super sure?</label>
</p>
<p class="conditional" data-condition="#example1 && example2">
    <label>Then type "yay": </label>
    <input type="text" name="yay" placeholder="yay">
</p>
<!-- This will be shown only if BOTH examle1 and examle2 are checked AND 'yay' typed in examle3 -->
<p class="conditional msg"
   data-condition="#example1 && example2 && yay == 'yay'">
    Both are selected and YAY is typed!
</p>
<p>
    <label>Pick two or three:</label>
    <select class="select" name="-example_5">
        <option>....</option>
        <option value="one">One!</option>
        <option value="two">Two!</option>
        <option value="three">Three!</option>
        <option value="four">Four!</option>
    </select>
</p>
<!-- NOTE: IE browsers do not support *.includes(...) function.
    So on production, it is better to use (-example_5 == 'two') || (-example_5 == 'three') -->
<div class="conditional msg"
     data-condition="(-example_5 == 'three') || (-example_5 == 'three')">
    See?! It works with selects!
</div>
</body>
</html>
