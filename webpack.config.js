const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const { getWebpackEntryPoints } = require("@wordpress/scripts/utils/config");
const path = require("path");

module.exports = {
	...defaultConfig,
	entry: {
		...getWebpackEntryPoints(),
		"tktk-blocks-styles": "./src/tktk-styles/index.js",
		"tktk-blocks-plugins": "./src/plugins/index.js",
	},
	resolve: {
		...defaultConfig.resolve,
		alias: {
			"@components": path.resolve(__dirname, "./src/components"),
			"@plugins": path.resolve(__dirname, "./src/plugins"),
		},
	},
	module: {
		...defaultConfig.module,
		rules: [
			...defaultConfig.module.rules,
			{
				test: /\.svg$/,
				use: ["@svgr/webpack", "url-loader"],
			},
		],
	},
};
