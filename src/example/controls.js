import { __ } from '@wordpress/i18n';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, PanelRow, ToggleControl } from '@wordpress/components';

const Controls = ({ attributes, setAttributes }) => {
  const { showSpecialMessage } = attributes;

  return (
    <InspectorControls className="tktk-controls">
      <PanelBody title={__('TKTK Settings', 'tktk-blocks')}>
        <PanelRow>
          <div className="w-full">
            <ToggleControl
              label={__('Show Special Message', 'tktk-blocks')}
              checked={showSpecialMessage}
              onChange={() =>
                setAttributes({ showSpecialMessage: !showSpecialMessage })
              }
            />
          </div>
        </PanelRow>
      </PanelBody>
    </InspectorControls>
  );
};

export default Controls;
