import { registerPlugin } from "@wordpress/plugins";
import { PluginSidebar } from "@wordpress/edit-post";
import { __ } from "@wordpress/i18n";

const GlobalPluginSidebar = () => {
	return (
		<PluginSidebar
			name="global-plugin-sidebar"
			title="TKTK Blocks"
			icon="admin-site"
		>
			<p>Plugin Sidebar</p>
		</PluginSidebar>
	);
};

registerPlugin("global-sidebar", { render: GlobalPluginSidebar });
