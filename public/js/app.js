$('.pop').hide();
let block = true

//Clic on input Pokemon

$('.pokemon').on('click', () => {
    if (block == true) {

        $.ajax({
            url: "https://pokeapi.co/api/v2/pokemon?limit=20",
            data: {},
            type: "GET",
            dataType: "json"
        })
            .done(function (json) {
                json.results.forEach(e => {
                    $.ajax({
                        url: e.url,
                        data: {},
                        type: "GET",
                        dataType: "json"
                    })
                        .done(function (json) {
                            let url = json.sprites.front_default
                            let poke = $(`<img class='poke' src="${url}">`)
                                .on('click', () => {
                                    $('.pokemon').val(url)
                                    block = true
                                    $('.pop').hide();
                                    $('.pop').html('');
                                })
                            $('.pop').append(poke)
                        })
                })
                $('.pop').show(150);
                block = false;
            })
    }
})

//Clic on input skills
$('.skills').on('click', () => {
    if (block == true) {
        tab = [
        'fab fa-js',
        'fab fa-php',
        'fab fa-symfony',
        'fab fa-angular',
        'fab fa-vuejs',
        'fab fa-python',
        'fab fa-bootstrap',
        'fab fa-wordpress',
        'fab fa-node',
        'fab fa-html5',
        'fab fa-css3-alt',
        'fab fa-sass',
        'fas fa-database',
        'fab fa-github',
        'fas fa-terminal'
    ]
             tab.forEach(e => {
                            let skillFa = e
                            let skill = $(`<i class="${skillFa} fa-2x"></i>`)
                                .on('click', () => {
                                    $('.skills').val(skillFa)
                                    block = true
                                    $('.pop').hide();
                                    $('.pop').html('');
                                })
                            $('.pop').append(skill)  
                })
                $('.pop').show(150);
                block = false;
            }   
})
//Clic on input hobbies
$('.hobbies').on('click', () => {
    if (block == true) {
        tab = [
            '📖',
            '🎼',
            '🎬',
            '🎮',
            '🧳',
            '🏃‍♂️',
            '🧗‍♀️',
            '🛹',
            '🚵‍♀️',
            '⚽️',
            '🎾',
    ]
             tab.forEach(e => {
                            let hobbyFa = e
                            let hobby = $(`<span>${hobbyFa}</span>`)
                                .on('click', () => {
                                    $('.hobbies').val(hobbyFa)
                                    block = true
                                    $('.pop').hide();
                                    $('.pop').html('');
                                })
                            $('.pop').append(hobby)  
                })
                $('.pop').show(150);
                block = false;
            }   
})

// Menu nav-bar

$('.user-avatar').on('click', function(e){

    $('.list-utilities').toggleClass('hide');

})