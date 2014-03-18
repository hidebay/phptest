[{ if !$az_ipayment_blActive }]
    [{* If the ipayment module has been deactivated then return the unmodified parent block: *}]
	[{ $smarty.block.parent }]
[{ else }]

<script type="text/javascript">
<!--
	/**
	 * An array containing all the payment method forms.
	 */
    var aPaymentForms = new Array();

	/**
	 * Registers a payment method form so that it can be handled by selectPayment() and submitActiveForm().
	 */
    function addPaymentForm ( sPaymentId, oForm ) {
        aPaymentForms[ sPaymentId ] = oForm;
        // Call selectPayment() when clicking on the payment radio button, to clear the radio buttons in all other payment forms:
        if ( oForm.paymentid ) {
            var fncOrigHandler = oForm.paymentid.onclick;
            oForm.paymentid.onclick = function() {
                // Select the payment method:
                selectPayment( sPaymentId );
                // Call the original event handler:
                if ( fncOrigHandler ) fncOrigHandler();
            };
        }
        // Select a payment method if one of its input fields gets the focus:
        if ( oForm.elements ) {
            for ( var i = 0; i < oForm.elements.length; i++ ) {
                var oElement = oForm.elements[ i ];
                var fncOrigHandler = oElement.onfocus;
                oElement.onfocus = function() {
                    // Select the payment method:
                    selectPayment( sPaymentId );
                    // Call the original event handler:
                    if ( fncOrigHandler ) fncOrigHandler();
                };
            }
        }
    }

    /**
     * Selects a payment method form (checking the radio button and unchecking all other payment method forms' radio buttons).
     */
    function selectPayment ( sPaymentId ) {
        // Make sure that the radio buttons of all other payment forms are unchecked:
        for ( var sFormPaymentId in aPaymentForms ) {
            var oForm = aPaymentForms[sFormPaymentId];
            if ( !oForm || !oForm.paymentid ) {
                continue;
            }
            if ( sFormPaymentId == sPaymentId ) {
                oForm.paymentid.checked = true;
            }
            else {
                oForm.paymentid.checked = false;
            }
        }
    }

    /**
     * Submits the currently selected payment method form (the form of which the radio button is currently checked).
     */
    function submitActiveForm () {
        for ( var sFormPaymentId in aPaymentForms ) {
            var oForm = aPaymentForms[sFormPaymentId];
            if ( oForm && oForm.paymentid && oForm.paymentid.checked ) {
                oForm.submit();
				return false;
            }
        }
    }
//-->
</script>

[{* Show the original template block: *}]
[{ capture name="az_ipayment_parent_block" }]
	[{ $smarty.block.parent }]
[{/capture }]
<div id="payment">
	[{* replace the original payment form id and add a div with that id because styles and scripts depend on the "payment" id, and hide the submit/"next" button for non-javascript: *}]
	[{ $smarty.capture.az_ipayment_parent_block|replace:'id="payment"':'id="payment_oxid"'|replace:'id="paymentNextStepBottom"':'id="paymentNextStepBottom" style="display:none;"' }]
</div>

[{* Show the submit/"next" button and add an event handler to it that submits the currently selected payment method form: *}]
<script type="text/javascript">
<!--
	var submitButton = document.getElementById( "paymentNextStepBottom" );
    //Register the submitActiveForm() function as an event handler on the submit/"next" button:
    submitButton.onclick = submitActiveForm;
	// Show the submit/"next" button (which has been hidden for non-javascript):
	submitButton.style.display = "block";
//-->
</script>

[{/if }]