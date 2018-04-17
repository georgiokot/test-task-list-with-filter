import 'bootstrap'
import '../sass/app.sass'

jQuery( document ).ready(function() {
    $(".alert").alert();
    addEvents();
    $('form').on('submit', function (event) {
        event.preventDefault();
        let $form  = $(event.target);

        fetch("/filter?" + $(event.target).serialize(), {
            method: "GET",
        })
            .then( response => {
                if(response.status == 200){
                    return response.json()
                }
            })
            .then( json => {
                jQuery('#orders').html(json.result)
                addEvents();
            })
        ;
    })

    function addEvents() {
        jQuery('.page-link').on('click', (event) =>  {
            event.preventDefault()
            getOrders(jQuery(event.target).attr('href'))
        })
        jQuery('.popup_order').on('click', (event) => {
            event.preventDefault();
            getOrderItem(jQuery(event.target).attr('href'))
        })
    }

    function getOrders(url) {
        fetch( url , {
            method: "GET",
            headers: {
                'Content-Type': 'application/json'
            },
        })
            .then( response => {
                if(response.status == 200){
                    return response.json()
                }
            })
            .then( json => {
                jQuery('#orders').html(json.result)
                addEvents();
            })
        ;
    }

    function getOrderItem(url) {
        fetch( url , {
            method: "GET",
            headers: {
                'Content-Type': 'application/json'
            },
        })
            .then( response => {
                if(response.status == 200){
                    return response.json()
                }
            })
            .then( json => {
                jQuery(json.modal).modal('show')
            })
        ;
    }
});