 <div id="news-items-rightside" > 
    @foreach($news as $newsItem) 
        <div class="col-md-4">
           <a href="{{ url(getItemSlugLink('news', $newsItem)) }}">
               <figure>
                   {{ HTML::image('img/dyn-contens/'. $newsItem->img, languageTransform($newsItem, 'title'), array('class' => 'img-responsive center-block')) }}
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($newsItem, 'title')}}  
                       </p>
                       <p>
                           {{$newsItem->getPostedDate()->format('d/m/Y')}}
                       </p>
                       <p>
                           {{languageTransform($newsItem, 'sum')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$news->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             