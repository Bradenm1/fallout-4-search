/*----------------------------------------------------
-- onClickFilters()
-- Displays/hides the filters with a toggle
----------------------------------------------------*/
function onClickFilters()
{
    // Returns the first instance of the class
    group = document.getElementsByClassName('main-checkbox-holder')[0];
    if (group.style.display == 'none'){
        group.style.display = 'block';
    } else {
        group.style.display = 'none';
    }
}

    
/*----------------------------------------------------
-- CheckAndUnCheck()
-- Checks/uncheck all checkboxes using a toggle
----------------------------------------------------*/
function CheckAndUnCheck()
{
    // Returns an array of all checkboxes
    checkboxes = document.getElementsByClassName('form-check-input');
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked)
        {
            checkboxes[i].checked = false;
        } else {
            checkboxes[i].checked = true;
        }
    }
}