/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { useState } from '@wordpress/element';

/**
 * Internal dependencies
 */

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
  const { title, showSpecialMessage } = attributes;

  return (
    <div {...useBlockProps()}>
      <div>
        <RichText
          tagName="h1"
          value={title}
          onChange={(value) => setAttributes({ title: value })}
          placeholder="Title"
          className="title"
        />
        {showSpecialMessage && <p>Hello world!</p>}
      </div>
    </div>
  );
}
