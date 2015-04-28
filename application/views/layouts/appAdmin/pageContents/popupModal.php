<div class="modal fade modal-wide" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-container="body">

   <div style="background: #fff;" class="modal-dialog">
      <div class="modal-content content-box-large">
         <div class="modal-body" style="max-height: 300px; overflow-y: auto; ">

            <div class="row text-center">
              <div class="MediaContainer">
                <?php foreach ($mediaModalListData as $mediaModalListData_item): ?>
                <button type="button" class="selImgBtn" value="<?php echo $mediaModalListData_item['imgName'];?>">
                    <img class="img-thumbnail model-media-img" height="45" width="60" src="<?php echo $this->config->item('images_path_database');?><?php echo $mediaModalListData_item['imgName'];?>" />
                </button>
               <?php endforeach ?> 
              </div>
              
            </div> <!-- Row Close -->
         </div> <!-- Modal Body Close -->
         <div class="modal-footer">
            <form class="form-inline" role="form">
              <div class="controls controls-row">
                <span class="col-sm-3">
                    <input type="text" class="form-control" name="selImgVal" id="SelImgVal" value="" placeholder="Selected Image Name" />
                 </span>
                <span class="col-sm-6">
                    <input type="text" class="form-control" name="selImgUrl" id="SelImgUrl" value="" placeholder="Selected Image Url" />
                 </span>
                 <input type="hidden" id="selImgFor" value="" name="selImgHdnFor" />
                <span class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-xs" id="modImgGet" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="button" class="btn btn-primary  btn-xs" data-dismiss="modal" onclick="newWin('popupMediaAdd');">Upload</button>
                </span>
              </div>
             </form>
          </div> <!-- Model Footer Close -->
         </div> <!-- Model Dialog -->
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
