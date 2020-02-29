<?php

function MakeInputRowTextbox($id, $name, $title)
{
    echo <<<EOT
<div class="form-group">
    <label for="$id">$title</label>
    <input id="$id" type="text" name="$name" class="form-control">
</div>
EOT;
}

function MakeInputRowList($id, $name, $title, $items){
    $list = CreateOptions($items);
    echo <<<EOT
<div class="form-group">
    <label for="$id">$title</label>
    <select name="$name" class="form-control">
    $list
    </select>
</div>
EOT;
}

function MakeInputRowListWithButton($id, $name, $title, $items){
    $list = CreateOptions($items);
    echo <<<EOT
<div class="form-group">
    <label for="$id">$title</label>
    <div class="input-group">
        <select name="$name" class="form-control">
        $list
        </select>
        <div class="input-group-btn">
            <button class="btn btn-primary" type="button">Add</button>
        </div>
    </div>
</div>
EOT;
}

/*This is a placeholder for another HTML list type element*/
function MakeInputRowDataList($id, $name, $title, $items){
    $list = CreateOptions($items);
    echo <<<EOT
<div class="form-group">
    <label for="$id">$title</label>
    <input list="$id" name="$name">
    <datalist id="$id" class="form-control">
    $list
    </datalist>
</div>
EOT;
}

function MakeInputRowDatetimebox($id, $name, $title)
{
    echo <<<EOT
<div class="form-group">
    <label for="$id">$title</label>
    <input id="$id" type="datetime-local" name="$name" class="form-control">
</div>
EOT;
}

/**
 * @param $items array of options for the list
 * @return string html code for list options
 */
function CreateOptions($items){
    error_log(json_encode($items));

    $result = "";

    foreach ($items as $key => $value){
        $result = $result . "<option value=\"" . $key . "\">" . $value . "</option>\n";
    }
    // for ($i = 0; $i < count($items); $i++){
    //     $result = $result . "<option value=\"" . $items[$i] . "\">" . $items[$i] . "</option>\n";
    // }

    return $result;
}
