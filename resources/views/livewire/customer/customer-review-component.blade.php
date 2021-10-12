<div class="tab-pane fade active in" id="reviews" >
    <div id="comments">
        <h2 class="woocommerce-Reviews-title">Add review for</h2>
        <ol class="commentlist">
            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">

                <div id="comment-20" class="comment_container">
                    <img alt="" src="" height="80" width="80">
                    <div class="comment-text">
                        <div class="star-rating">
                            <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                        </div>
                        <p class="meta">
                            <strong class="woocommerce-review__author">{{$orderItem->product->name ?? ''}}</strong>
                        </p>
                        <div class="description">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                        </div>
                    </div>
                </div>

            </li>
        </ol>
    </div><!-- #comments -->
    <div class="col-sm-12">
        <ul>
            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
        </ul>
        <form action="{{route('addReview', $product->id)}}" method="POST">
            @csrf
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-warning">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="comment-form-rating">
                <span>Your rating</span>

                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" wire:model.lazy="rating" checked/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" wire:model="rating"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" wire:model.lazy="rating"/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" wire:model="rating"/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" wire:model="rating"/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" wire:model="rating"/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" wire:model="rating"/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" wire:model="rating"/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" wire:model="rating"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" wire:model="rating"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>

            </div>
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
            <textarea name="comment" id="comment" cols="45" rows="8" wire:model="comment"></textarea>

            <button class="btn btn-default">
                Lưu
            </button>
        </form>
    </div>
</div>

