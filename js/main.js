function input_f_checkbox(b, id){
    document.getElementById(id).disabled = !b
}

function open_or_close_theme_creator(){
    let topic_creator = document.getElementById('topic_creator');
    console.log(topic_creator.style.display)
    if (topic_creator.style.display === "none"){
        topic_creator.style.display = "unset";
    }
    else {
        topic_creator.style.display = "none";
    }
}