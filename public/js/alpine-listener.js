document.addEventListener('livewire:initialized', () => {
    Livewire.on('close-modal', ({modal_close_id}) => {
        document.getElementById(modal_close_id).click();
    });
});
