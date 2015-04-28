<article class="grid_12">
                  
                  <!-- Left Pannl Services List -->
                  
                  <h3 class="color-1">Our Services</h3>
                  <div class="wrapper">
                    <article class="grid_6 alpha Servc_lftNme">
                      <div class="extra-wrap">
                        <div class="indent-top content-container">
                          <div class="contentFetch">
            <?php foreach ($productsListData as $productsListData_item):  
                    $P_NameLftPnl =  urlencode($productsListData_item['name']);
                    ?>
                    <ul class="list-1">
                      <li><a class="link" href="<?php echo base_url();?>/app/Services/<?php echo $productsListData_item['slug'];?>"><?php echo $productsListData_item['name']; ?></a></li>
                    </ul>
              <?php endforeach ?>
                        </div>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </article>
                    
                      <!-- Single Service Feching Code -->
                    <?php
                    if(!isset($productsRightListData)) {
                      ?>
                    <article class="grid_6 omega prod_desc content-container">
                          <div class="contentFetch">
                            
            <h3 class="serNe_sngl"><?php echo $productSingleData['name']; ?></h3>
                <img class="ser_img_sngl" src="<?php echo base_url();?>/images/blockImages/<?php echo $productSingleData['imageFeatured'];?>" alt="<?php echo $productSingleData['name']; ?>">
               <div class="extra-wrap">
                        <div class="indent-top">
                          <p class="list-1 serv_desc_sing">
                            <?php echo $productSingleData['description']?> <br />
                            <?php
                              if(($productSingleData['minPrice'] != "") || ($productSingleData['maxPrice'] != ''))
                  {
                                  if(($productSingleData['minPrice'] != "")  && ($productSingleData['maxPrice'] != ""))
                    {
                    ?>
                      <p class="prd_Price">Price Range = 
                        <?php echo $productSingleData['minPrice'] . " to " .$productSingleData['maxPrice']?>
                      </p>
                    <?php
                    }
                    
                    elseif(($productSingleData['minPrice'] != "")  && ($productSingleData['maxPrice'] == ""))
                    {
                    ?>
                      <p class="prd_Price">Price Range = 
                        <?php echo $productSingleData['minPrice'] . " onwards " ?>
                      </p>
                    <?php
                    }
                    
                    elseif(($productSingleData['minPrice'] == "")  && ($productSingleData['maxPrice'] != ""))
                    {
                    ?>
                      <p class="prd_Price">Price Range = 
                        <?php echo "Upto " . $productSingleData['maxPrice']; ?>
                      </p>
                    <?php
                    }
                 } ?>
                
                            <?php
                              if(($productSingleData['MRP'] != "") || ($productSingleData['discountPercentage'] != '' ))
                  {
                    if(($productSingleData['MRP'] != "")  && ($productSingleData['discountPercentage'] != ""))
                    {
                    ?>                      
                      <p class="prd_Price"> <span>MRP</span>  = 
                        <?php echo '<span  class="MrpPrice">' . $productSingleData['MRP'];?> /- </span> <br />
                        Offer Price = <span class="OfferPrice"><?php echo (($productSingleData['MRP'])-(($productSingleData['MRP']) * ($productSingleData['discountPercentage']) /100 ))?>  /- </span><br />
                        Your Benefit = <span class="BeneftPrice"> <?php echo (($productSingleData['MRP']) * ($productSingleData['discountPercentage']) /100 )?>  /-  @ <?php echo $productSingleData['discountPercentage']; ?>% </span>
                      </p>
                    <?php
                    }
                    
                    elseif(($productSingleData['MRP'] != "")  && ($productSingleData['discountPercentage'] == ""))
                    {
                    ?>
                      <p class="prd_Price">Price = 
                        <?php echo $productSingleData['MRP']?>
                      </p>
                    <?php
                    }
                    
                    elseif(($productSingleData['MRP'] == "")  && ($productSingleData['discountPercentage'] != ""))
                    {
                    ?>
                      <p class="prd_Price">
                      </p>
                    <?php
                    }
                  } 
                  ?>
                          </p>
                        </div>
                      </div>
                      
                      <!-- View More Option Images for Single Service COde -->
           
                      <div class="clear"></div>
                     </div>
                    </article>
                    <?php
                    }
                    else {
                    ?>
                    <!-- Right Pannel Services Description Code -->
                    
           
              <div class="grid_6 omega">
             <?php foreach ($productsRightListData as $productsListData_itemRght):  
                    $P_NameRghtPnl =  urlencode($productsListData_itemRght['name']);
                    ?>
            <div class="content-container">
                          <div class="contentFetch">
              <p class="serNe_sngl">
                <a class="serNe_sngl" href="<?php echo base_url();?>/app/Services/<?php echo $productsListData_itemRght['slug'];?>">
                <?php echo $productsListData_itemRght['name'];?>
                </a>
              </p>
              
                <figure class="img-indent serv_pic">
                <img class="servc_pict" src="<?php echo base_url();?>/images/blockImages/<?php echo $productsListData_itemRght['imageFeatured'];?>" alt="<?php echo $productsListData_itemRght['name'];?>">
              </figure>
               
               <div class="extra-wrap">
                <div class="indent-top">
                  <p class="list-1 serv_dec">
                  <?php $projD = substr($productsListData_itemRght['description'],0,200); echo $projD; ?>...
                    <a href="<?php echo base_url();?>/app/Services/<?php echo $productsListData_itemRght['slug'];?>" class="serv_prdMr">More</a>
                  </p>
                </div>
                </div>
                </div>
               </div>
                <div class="clear"></div>
                    
          <?php endforeach ?>
            </div>
            <?php } ?>
                           </div>
                </article>
