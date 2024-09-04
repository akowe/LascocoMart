<!DOCTYPE html>
<html>
<head>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href= "/css/app.css">
</head>
<body>
<div class="container py-5">
    <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    @if ($verified_purchase->count() > 0)
                        <h5>You are writing a review for {{ $product->prod_name }}</h5>
                        <form action="{{ url('/add-review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="rating-css">
                                <div class="star-icon">
                                    <input type="radio" value="1" name="stars_rated" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="stars_rated" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="stars_rated" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="stars_rated" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="stars_rated" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                            <button type="submit" class="btn btn-primary-3">Submit Review</button>
                        </form>
                    @else
                        <div class="alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>
                                For the trustworthiness of the reviews, only customers who purchase the product can write a review about the product.
                            </p>
                            <a href="{{ url('/') }}" class="btn btn-danger">Go to home page</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>