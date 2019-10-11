var add_display = document.getElementById('add');
var mod_display = document.getElementById('mod');
var delete_display = document.getElementById('delete');
var visu_display = document.getElementById('visu');


visu_brand();
function visu_brand() {
    var brandOpen = document.getElementById('visu_btn');
    brandOpen.addEventListener('click', visu_brand);
    if (visu_display.style.display == 'none') {
        visu_display.style.display = 'block';
        mod_display.style.display = 'none';
        add_display.style.display = 'none';
        delete_display.style.display = 'none';
    } else {
        visu_display.style.display = 'none';
    }
}


add_brand();
function add_brand() {
    var addOpen = document.getElementById('add_btn');
    addOpen.addEventListener('click', add_brand);
    if (add_display.style.display == 'none') {
        add_display.style.display = 'block';
        mod_display.style.display = 'none';
        delete_display.style.display = 'none';
        visu_display.style.display = 'none';
    } else {
        add_display.style.display = 'none';
    }
}

mod_brand();
function mod_brand() {
    var modBrand = document.getElementById('mod_btn');
    modBrand.addEventListener('click', mod_brand);
    if (mod_display.style.display == 'none') {
        mod_display.style.display = 'block';
        add_display.style.display = 'none';
        delete_display.style.display = 'none';
        visu_display.style.display = 'none';
    }
    else {
        mod_display.style.display = 'none';
    }
}

delete_brand();
function delete_brand() {
    var deleteOpen = document.getElementById('delete_btn');
    deleteOpen.addEventListener('click', delete_brand);
    if (delete_display.style.display == 'none') {
        delete_display.style.display = 'block';
        mod_display.style.display = 'none';
        add_display.style.display = 'none';
        visu_display.style.display = 'none';
    }
    else {
        delete_display.style.display = 'none';
    }
}
