approveReads = function(){

    function init() {
        console.log('approveReads was initialized');
        const approvalButtons = document.getElementsByClassName('approve');
        for (let x = 0 ; x < approvalButtons.length ; x++) {
            approvalButtons[x].addEventListener('click', approve);
        }
    }

    function approve(e) {
        const outcome = e.target;
        console.log('request ' + outcome.dataset.request_id);
        console.log('approved ' + outcome.dataset.is_approved);
        console.log('payout ' + document.getElementById('payout_' + outcome.dataset.request_id).value);

        document.getElementById('request_id').value = outcome.dataset.request_id;
        document.getElementById('is_approved').value = outcome.dataset.is_approved;
        document.getElementById('payment').value = document.getElementById('payout_' + outcome.dataset.request_id).value;
        document.getElementById('read_approve_frm').submit();
    }

    return{
        init:init,
        approve:approve,
        }
}();

window.addEventListener('load', approveReads.init);
