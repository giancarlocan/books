approveReport = function(){

    function init() {
        console.log('approveReport was initialized');
        const approvalButtons = document.getElementsByClassName('approve');
        for (let x = 0 ; x < approvalButtons.length ; x++) {
            approvalButtons[x].addEventListener('click', approve);
        }
    }

    function approve(e) {
        const outcome = e.target;
        console.log('approved ' + outcome.dataset.is_approved);

        document.getElementById('is_approved').value = outcome.dataset.is_approved;
        document.getElementById('report_approve_frm').submit();
    }

    return{
        init:init,
        approve:approve,
        }
}();

window.addEventListener('load', approveReport.init);
