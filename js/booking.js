const seats = document.querySelectorAll('.seat');
const confirmbutton = document.getElementById('confirmbutton');
const ticketCount = document.getElementById('ticketCount');
const totalPrice = document.getElementById('totalPrice');


seatNumbers.forEach(function(seatId) {
    var seatElement = document.getElementById(seatId);
    if (seatElement) {
        seatElement.classList.add('reserved');
    }
});


seats.forEach(seat => {
    seat.addEventListener('click', () => {
        if (!seat.classList.contains('reserved')) {
            seat.classList.toggle('selected');
            updateReservedSeats();
            updateNumberOfTicketsAndTotal(); // Add this line to update the number of tickets
        }
    });
});


function updateReservedSeats() {
    const selectedSeats = document.querySelectorAll('.seat.selected');
    const seatIDs = document.getElementById('seatIDs');

    const selectedSeatIDs = Array.from(selectedSeats).map(seat => seat.id).join(',');
    seatIDs.value = selectedSeatIDs;

    // Debugging to ensure the "seatIDs" field is correctly set
    console.log('Selected Seat IDs:', selectedSeatIDs);

    // Proceed with form submission
    
}




function updateNumberOfTicketsAndTotal() {
    const ticketPrice=500;
    const selectedSeats = document.querySelectorAll('.seat.selected');
    const numberOfSelectedSeats = selectedSeats.length;
    const NumberOfTickets = document.getElementById("no_of_tickets");
    const total =document.getElementById("total");
    const tot = numberOfSelectedSeats*ticketPrice;
    NumberOfTickets.innerHTML = numberOfSelectedSeats;
    ticketCount.value = numberOfSelectedSeats;
    total.innerHTML = "Rs."+ tot;
    totalPrice.value = tot;
    // console.log(totalPrice);
    // console.log(ticketCount);
}

// const selectedSeatIDs = seatIDs.value.split(',');
// console.log(selectedSeatIDs);

document.getElementById('confirmbutton').addEventListener('click', function(event) {
    

    var numberOfTicketsDiv = document.getElementById('no_of_tickets');
    var numberOfTickets = parseInt(numberOfTicketsDiv.textContent);

    if (isNaN(numberOfTickets) || numberOfTickets <= 0) {
        // No value in no_of_tickets or it's not a positive number
        alert("Please select at least one seat for reservation.");
        event.preventDefault(); // Prevent the form from being submitted
    } else {
        event.preventDefault();
        // Add the 'reserved' class to selected seats
        // const selectedSeats = document.querySelectorAll('.seat.selected');
        // selectedSeats.forEach(seat => {
        //     seat.classList.remove('selected'); // Remove 'selected' class
        //     seat.classList.add('reserved'); // Add 'reserved' class
        // });
        // Update the reserved seats input
        updateReservedSeats();
        document.getElementById('reservation_form').submit();
    }
});

