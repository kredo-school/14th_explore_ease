//If user dont check the check-box blow "Message from Venue", cant hit a submit button

    const consent = document.querySelector("#with-consent");

    const button = document.querySelector("#submit");

    consent.addEventListener('change', () => {

        if (consent.checked === true) {
            button.disabled = false;
        } else {
            button.disabled = true;
        }
    });

//for seat checkbox

function reservationSubmit()
{
    const inputReservationDate = document.getElementById('datepicker').value.split('/');
    const reservationDate = `${inputReservationDate[2]}-${inputReservationDate[0]}-${inputReservationDate[1]}`;
    
    document.getElementById('confirmation_reservation_start_date').innerHTML = reservationDate;

    document.getElementById('hidden_reservation_start_date').value = reservationDate;
}

window.reservationSubmit = reservationSubmit;


//for create form

    const form = document.getElementById("form-reservation");
    form.addEventListener('input', (event) => {
        console.log(event.target.name);
        switch(event.target.id)
        {
            case 'number_of_people':
                document.getElementById('confirmation_number_of_people').innerHTML = `Number of people: ${event.target.value}`;
                document.getElementById('hidden_number_of_people').value = event.target.value;
                break;
                
            case 'reservation_start_date':
                document.getElementById('confirmation_reservation_start_date').innerHTML = `Reservation date: ${event.target.value}`; 
                document.getElementById('hidden_reservation_start_date').value = event.target.value;
                break;
                
            case 'reservation_start_time':
                document.getElementById('confirmation_reservation_start_time').innerHTML = `Reservation time: ${event.target.value}`; 
                document.getElementById('hidden_reservation_start_time').value = event.target.value;
                break;

            case 'requests':
                document.getElementById('confirmation_reservation_requests').innerHTML = `Requests: ${event.target.value}`; 
                document.getElementById('hidden_requests').value = event.target.value;
                break;

            default:
                if(event.target.name == 'course')
                    document.getElementById('hidden_course').value = event.target.value;
                break;
                
        }
    });



    