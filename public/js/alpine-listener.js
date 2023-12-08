document.addEventListener('livewire:initialized', () => {
    Livewire.on('close-modal', ({close_class}) => {
        document.querySelector('.' + close_class).click();
    });
});
