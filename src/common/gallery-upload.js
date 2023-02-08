import { __ } from '@wordpress/i18n';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';

const GalleryUpload = ({ saveData, images, buttonText }) => {
  return (
    <MediaUploadCheck
      fallback={`To edit the background image, you need permission to upload media.`}
    >
      <MediaUpload
        onSelect={saveData}
        type="image"
        value={images}
        gallery={true}
        multiple={true}
        render={({ open }) => (
          <div onClick={open} className="button button-primary">
            {__(buttonText, 'tktk-blocks')}
          </div>
        )}
      />
    </MediaUploadCheck>
  );
};

export default GalleryUpload;
