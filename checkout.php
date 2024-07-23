<?php
include('functions/userfunctions.php');
include('includes/header.php'); 
include('authenticate.php');
?>


<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">
                Home / 
            </a>
            <a href="checkout.php" class="text-white">
                Checkout
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5 class="fw-bold">Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                                    <small class="text-danger name"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                                    <small class="text-danger email"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" id="phone" required placeholder="Enter your phone number" class="form-control">
                                    <small class="text-danger phone"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" id="pincode" required placeholder="Enter your pin code" class="form-control">
                                    <small class="text-danger pincode"></small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                                    <small class="text-danger address"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5 class="fw-bold">Order Details</h5>
                            <hr>
                                <?php 
                                    $items = getCartItems();
                                    $totalPrice = 0;
                                    foreach ($items as $citem) 
                                    {
                                        ?>
                                        <div class="mb-1 border">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="uploads/<?= $citem['image']; ?>" alt="Image" width="60px">
                                                </div>
                                                <div class="col-md-5">
                                                    <label><?= $citem['name']; ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label><?= $citem['selling_price']; ?></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>x <?= $citem['prod_qty']; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                    }
                                ?>
                                <hr>
                            <h5>Total Price : <span class="float-end fw-bold">₹ <?= $totalPrice ?> </span> </h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-success w-100">Confirm and place order | COD</button>
                                <div id="paypal-button-container"></div>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>


<!-- Initialize the JS-SDK -->
<script
    src="https://www.paypal.com/sdk/js?client-id=AUxRct-3jxtlZKCDoTsuf1tdpp6SCEHw6Y_PK55usYywUkutygwXpfkBCWKZSmyWnKghGOErwUR8SMB8&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo"                                      
    data-sdk-integration-source="developer-studio"
></script>

<script>
    window.paypal
  .Buttons({
    style: {
      shape: "rect",
      layout: "vertical",
      color: "gold",
      label: "paypal",
    },
    message: {
      amount: '<?= $totalPrice ?>',
    } ,
    async createOrder() {
      try {
        const response = await fetch("/api/orders", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          // use the "body" param to optionally pass additional order information
          // like product ids and quantities
          body: JSON.stringify({
            cart: [
              {
                id: "YOUR_PRODUCT_ID",
                quantity: "YOUR_PRODUCT_QUANTITY",
              },
            ],
          }),
        });

        const orderData = await response.json();

        if (orderData.id) {
          return orderData.id;
        }
        const errorDetail = orderData?.details?.[0];
        const errorMessage = errorDetail
          ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
          : JSON.stringify(orderData);

        throw new Error(errorMessage);
      } catch (error) {
        console.error(error);
        // resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
      }
    } ,
    async onApprove(data, actions) {
      try {
        const response = await fetch(`/api/orders/${data.orderID}/capture`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
        });

        const orderData = await response.json();
        // Three cases to handle:
        //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
        //   (2) Other non-recoverable errors -> Show a failure message
        //   (3) Successful transaction -> Show confirmation or thank you message

        const errorDetail = orderData?.details?.[0];

        if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
          // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
          // recoverable state, per
          // https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
          return actions.restart();
        } else if (errorDetail) {
          // (2) Other non-recoverable errors -> Show a failure message
          throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
        } else if (!orderData.purchase_units) {
          throw new Error(JSON.stringify(orderData));
        } else {
          // (3) Successful transaction -> Show confirmation or thank you message
          // Or go to another URL:  actions.redirect('thank_you.html');
          const transaction =
            orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
            orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
          resultMessage(
            `Transaction ${transaction.status}: ${transaction.id}<br>
          <br>See console for all available details`
          );
          console.log(
            "Capture result",
            orderData,
            JSON.stringify(orderData, null, 2)
          );
        }
      } catch (error) {
        console.error(error);
        resultMessage(
          `Sorry, your transaction could not be processed...<br><br>${error}`
        );
      }
    } ,
  })
  .render("#paypal-button-container");
</script>