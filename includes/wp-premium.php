<div class="plugins-accounts-wrapper chatgpt-ui-wrapper">
    <div class="top-header">
        <h1>Upgrade</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>


    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo; ?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Upgrade</a></li>

            </ul>
        </div>

        <div class="right-sec-wrap">
            <div class="main-content-wrap">

                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Upgrade</h3>
                    <div class="full-wid-content-area-info upgrade-plans-wrap">
                        <div class="full-wid-data-info">
                            <div class="content-info txt-cen">
                                <span class="icon-info"><?php echo $iUpgradeiconone ?></span>
                                <div class="please-note-info">
                                    <p>You are fully protected by our 100% Money Back Guarantee. If during the next 7 days you experience an issue that makes the plugin unusable and we are unable to resolve it, we'll happily consider offering a full refund of your money. <a href="#">Learn More...</a></p>
                                </div>

                            </div>


                            <div class="choose-plans-info">
                                <div class="input-info">
                                    <select>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Annually(upto 25% off)">Annually (upto 25% off)</option>
                                        <option value="Lifetime">Lifetime</option>
                                    </select>
                                </div>

                            </div>
                            <div class="upgrade-plans-info">




                            </div>





                        </div>




                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content-payment">
        <span class="close">&times;</span>
        <div class="panel-area-content">
            <div class="panel-area-label-account-label-details">
                <div class="panel-area-label-account-label">
                </div>
                <div class="panel-area-label-account-info">
                    <h4 class="payment-heading"> Add Card Details</h4>
                </div>
            </div>
        </div>
        <form id="payment-form" action="" method="POST">
            <input type="hidden" name="plan" id="plan">

            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="form-group">
                        <!-- <label for="">Name</label> -->
                        <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="form-group">
                        <label for="">Card details</label>
                        <div id="card-element"></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <hr>
                    <button type="submit" class="btn btn-primary" id="card-button">Purchase</button>
                </div>
            </div>

        </form>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        // Function to fetch plan data and generate HTML
        function fetchAndRenderPlans() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://api.aiharness.io/api/plan",
                success: function(data) {
                    var plan = data.data;
                    var isSubscribed = 'Subscription  Not exist.'; // Initialize subscription status
                    var email = "<?= $current_user->user_email; ?>";
                    console.log(email);
                    console.log('<?= $secertkey; ?>');
                    // Check subscription status
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "https://api.aiharness.io/api/check-subscription",
                        headers: {
                            "secertkey": "<?= $secertkey; ?>",
                        },
                        success: function(response) {
                            isSubscribed = response.message.message;
                            console.log(response);

                            // Iterate over each element in the plan array
                            for (var i = 0; i < plan.length; i++) {
                                var planName = plan[i].name;
                                var planPrice = plan[i].price;
                                var planFeatures = plan[i].plan_feature_associates;

                                // Generate the HTML dynamically for the current plan
                                var planHtml = '<div class="select-plan-info free-plan-info">';
                                planHtml += '<div class="head-part-info">';
                                planHtml += '<h4>' + planName + '</h4>';
                                planHtml += '</div>';
                                planHtml += '<div class="content-part-info">';
                                planHtml += '<div class="price-info">';
                                planHtml += '<h2><span></span>' + planPrice + '<span>/MO</span></h2>';
                                planHtml += '</div>';
                                planHtml += '<div class="add-more-cta-info">';

                                if (planName === 'Free') {
                                    if (isSubscribed === 'Subscription Exist.') {
                                        console.log(isSubscribed);
                                        planHtml += '<a class="disabled" style="pointer-events: none;"><s>Continue Free</s></a>';
                                    } else {
                                        planHtml += '<a href="#">Continue Free</a>';
                                    }
                                } else if (planName === 'Premium') {
                                    var input = document.getElementById("plan");
                                    var appendedValue = plan[i].id;
                                    input.value += appendedValue;

                                    if (isSubscribed === 'Subscription Exist.') {
                                        console.log(isSubscribed);
                                        planHtml += '<a class="">Purchased</a>';
                                    } else {
                                        planHtml += '<a class="upgrade-btn" id="myBtn2">Upgrade Plan</a>';
                                    }
                                }

                                planHtml += '</div>';
                                planHtml += '<div class="plan-points-info">';

                                planFeatures.forEach(function(feature) {
                                    planHtml += '<ul>';
                                    planHtml += '<li>' + feature.name + '</li>';
                                    planHtml += '</ul>';
                                });

                                planHtml += '</div>';
                                planHtml += '</div>';
                                planHtml += '</div>';

                                // Append the plan HTML to the desired element
                                $('.upgrade-plans-info').append(planHtml);
                            }

                            // Attach the click event to the upgrade button
                            $(".upgrade-btn").click(function(event) {
                                event.preventDefault();
                                // Open the modal
                                modal.css("display", "block");
                            });
                            // Attach the click event to the upgrade button
                            $(".upgrade-btn").click(function(event) {
                                event.preventDefault();

                                var email = "<?= $current_user->user_email; ?>";
                                $.ajax({
                                    url: "https://api.aiharness.io/api/create-intend",
                                    type: 'POST',
                                    beforeSend: function(xhr) {
                                        xhr.setRequestHeader("secertkey", "<?= $secertkey; ?>");
                                        xhr.setRequestHeader("openai", "<?= $openAi; ?>");
                                    },
                                    dataType: 'json',
                                    data: {
                                        'email': email
                                    }
                                }).done(function(response) {
                                    if (response.result == 'Success') {
                                        $("#card-button").attr('data-secret', response.data.client_secret);
                                        $("#myModal2").css("display", "block");
                                    } else if (response.result == 'Failure') {
                                        alert("Something Went Wrong!!");
                                    }
                                }).fail(function(jqXHR, textStatus, errorThrown) {
                                    alert('FAILED! ERROR: ' + errorThrown);
                                });
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log("Subscription check failed:", error);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Failed to fetch plans:", error);
                }
            });
        }

        // Get the modal
        var modal = $("#myModal2");

        // Get the <span> element that closes the modal
        var span = $(".close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.css("display", "none");
        }

        // When the user clicks anywhere outside of the modal, close it
        $(window).click(function(event) {
            if (event.target == modal[0]) {
                modal.css("display", "none");
            }
        });

        // Fetch plans and render them on page load
        fetchAndRenderPlans();

    });
</script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_51MOJinSCLva0PA1sPjAdppP0I7ZSKgNqIHL5GIfxczthPHeixMXPK2uf3S4fGHrkPy8NO8KNPP2BTglevCWtfnPK00X5s79O8a')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if (error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')


            plan = $("#plan").val();
            // console.log(plan);
            token = setupIntent.payment_method

            $.ajax({

                url: "https://api.aiharness.io/api/create-subscription",
                type: 'POST',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                    xhr.setRequestHeader("openai", "<?php echo $openAi; ?>");
                },
                dataType: 'json',
                data: {
                    'token': token,
                    'plan': plan
                }
            }).done(function(response) {

                if (response.result == 'Success') {
                    // Display success message
                    var successMessage = response.message;
                    alert(successMessage);

                    // Disable the button after successful payment
                    document.getElementById("myBtn2").disabled = "disabled";

                    // Close the popup after 5 seconds
                    setTimeout(function() {
                        var modal = document.getElementById("myModal2");
                        modal.style.display = "none";

                        // Reload the page twice
                        location.reload();
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }, 1000);
                } else if (response.result == 'Failure') {
                    alert("Something Went Wrong!!");
                    // Enable the button after a failure
                    document.getElementById("myBtn2").disabled = false;
                }


            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert('FAILED! ERROR: ' + errorThrown);
            });
        }


    })
</script>