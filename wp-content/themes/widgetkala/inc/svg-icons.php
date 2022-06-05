<?php

class mtSvgIcons
{
    public function svg_icon($icon, $size)
    {
        $width = $height = $size;
        if(is_array($size)){
            $width = $size[0];
            $height = $size[1];
        }

        $icons_array = $this->icons_array();
        $repl        = sprintf('<svg class="svg-icon" width="%s" height="%s" aria-hidden="true" role="img" focusable="false" ',
            $width, $height);
        $svg         = preg_replace('/^<svg /', $repl, trim($icons_array[$icon])); // Add extra attributes to SVG code.
        $svg         = preg_replace("/([\n\t]+)/", ' ', $svg); // Remove newlines & tabs.
        $svg         = preg_replace('/>\s*</', '><', $svg);    // Remove whitespace between SVG tags.

        return $svg;
    }

    public function icons_array()
    {
        return [
            'link'              => /*custom link svg icon*/ '
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0z" fill="none"></path>
    <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"></path>
</svg>
',
            'menu_toggle'       => /*bootstrap default menu toggle svg icon*/ '
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
</svg>
',
            'support_icon'      => /*custom support icon*/ '
<svg xmlns="http://www.w3.org/2000/svg" width="50.781" height="50.348" viewBox="0 0 50.781 50.348">
<path class="icon" d="M46.023,5.408H38.392a.751.751,0,1,0,0,1.5h7.631a3.259,3.259,0,0,1,3.255,3.256V20.583a3.259,3.259,0,0,1-3.255,3.255H35.706a.751.751,0,0,0-.751.751v3.195L31.23,24.058a.751.751,0,0,0-.531-.22h-6.11a3.259,3.259,0,0,1-3.256-3.255V10.166a3.259,3.259,0,0,1,3.256-3.255H34.88a.751.751,0,0,0,0-1.5H30.949V4.757A4.763,4.763,0,0,0,26.191,0H4.757A4.763,4.763,0,0,0,0,4.757V6.418a.751.751,0,0,0,1.5,0V4.757A3.259,3.259,0,0,1,4.757,1.5H26.191a3.259,3.259,0,0,1,3.255,3.255v.651H24.589a4.763,4.763,0,0,0-4.758,4.758v8.263H11.969a.751.751,0,0,0-.751.751v3.195L7.492,18.649a.751.751,0,0,0-.531-.22h-2.2A3.259,3.259,0,0,1,1.5,15.174V9.911a.751.751,0,0,0-1.5,0v5.262a4.763,4.763,0,0,0,4.758,4.758H6.649l4.788,4.788a.751.751,0,0,0,1.282-.531V19.931h7.111v.651a4.763,4.763,0,0,0,4.758,4.757h5.8l4.788,4.788a.751.751,0,0,0,1.282-.531V25.34h9.565a4.763,4.763,0,0,0,4.758-4.757V10.166a4.763,4.763,0,0,0-4.758-4.758Zm0,0" transform="translate(0.001 0)" />
<path class="icon" d="M46.237,253.578l-2.05-.712a4.95,4.95,0,0,0,1.886-3.887v-1.5a4.958,4.958,0,0,0-9.916,0v1.5a4.95,4.95,0,0,0,1.886,3.887l-2.05.712a6.752,6.752,0,0,0-3.212,2.363H27.243v-2.185a6.766,6.766,0,0,0-4.543-6.387l-2.05-.712a4.95,4.95,0,0,0,1.886-3.887v-1.5a4.958,4.958,0,0,0-9.916,0v1.5a4.951,4.951,0,0,0,1.886,3.887l-2.05.712a6.766,6.766,0,0,0-4.543,6.387v2.185H.751a.751.751,0,0,0-.751.751v6.21a.751.751,0,0,0,.751.751H32a.686.686,0,0,1,.2,0H50.029a.751.751,0,0,0,.751-.751v-2.937a6.766,6.766,0,0,0-4.543-6.387Zm-8.578-6.1a3.455,3.455,0,0,1,6.911,0v1.5a3.455,3.455,0,1,1-6.911,0Zm-23.537-6.21a3.455,3.455,0,0,1,6.911,0v1.5a3.455,3.455,0,0,1-6.911,0Zm5.032,6.46.73.253-2.306,4-2.306-4,.73-.253Zm-9.739,6.028a5.263,5.263,0,0,1,3.534-4.968l.879-.3,3.1,5.379a.751.751,0,0,0,1.3,0l3.1-5.379.879.3a5.262,5.262,0,0,1,3.533,4.968v2.185H9.414ZM1.5,257.443H31.939a6.737,6.737,0,0,0-.489,2.522v2.185H1.5Zm47.776,4.707H32.952v-2.185A5.263,5.263,0,0,1,36.485,255l3.053-1.06h3.152L45.744,255a5.262,5.262,0,0,1,3.534,4.968Zm0,0" transform="translate(0.001 -213.3)" />
</svg>
',
            'support'           => /*support icon*/ '
			<svg xmlns="http://www.w3.org/2000/svg" width="50.781" height="50.348" viewBox="0 0 50.781 50.348">
<path class="icon" d="M46.023,5.408H38.392a.751.751,0,1,0,0,1.5h7.631a3.259,3.259,0,0,1,3.255,3.256V20.583a3.259,3.259,0,0,1-3.255,3.255H35.706a.751.751,0,0,0-.751.751v3.195L31.23,24.058a.751.751,0,0,0-.531-.22h-6.11a3.259,3.259,0,0,1-3.256-3.255V10.166a3.259,3.259,0,0,1,3.256-3.255H34.88a.751.751,0,0,0,0-1.5H30.949V4.757A4.763,4.763,0,0,0,26.191,0H4.757A4.763,4.763,0,0,0,0,4.757V6.418a.751.751,0,0,0,1.5,0V4.757A3.259,3.259,0,0,1,4.757,1.5H26.191a3.259,3.259,0,0,1,3.255,3.255v.651H24.589a4.763,4.763,0,0,0-4.758,4.758v8.263H11.969a.751.751,0,0,0-.751.751v3.195L7.492,18.649a.751.751,0,0,0-.531-.22h-2.2A3.259,3.259,0,0,1,1.5,15.174V9.911a.751.751,0,0,0-1.5,0v5.262a4.763,4.763,0,0,0,4.758,4.758H6.649l4.788,4.788a.751.751,0,0,0,1.282-.531V19.931h7.111v.651a4.763,4.763,0,0,0,4.758,4.757h5.8l4.788,4.788a.751.751,0,0,0,1.282-.531V25.34h9.565a4.763,4.763,0,0,0,4.758-4.757V10.166a4.763,4.763,0,0,0-4.758-4.758Zm0,0" transform="translate(0.001 0)" />
<path class="icon" d="M46.237,253.578l-2.05-.712a4.95,4.95,0,0,0,1.886-3.887v-1.5a4.958,4.958,0,0,0-9.916,0v1.5a4.95,4.95,0,0,0,1.886,3.887l-2.05.712a6.752,6.752,0,0,0-3.212,2.363H27.243v-2.185a6.766,6.766,0,0,0-4.543-6.387l-2.05-.712a4.95,4.95,0,0,0,1.886-3.887v-1.5a4.958,4.958,0,0,0-9.916,0v1.5a4.951,4.951,0,0,0,1.886,3.887l-2.05.712a6.766,6.766,0,0,0-4.543,6.387v2.185H.751a.751.751,0,0,0-.751.751v6.21a.751.751,0,0,0,.751.751H32a.686.686,0,0,1,.2,0H50.029a.751.751,0,0,0,.751-.751v-2.937a6.766,6.766,0,0,0-4.543-6.387Zm-8.578-6.1a3.455,3.455,0,0,1,6.911,0v1.5a3.455,3.455,0,1,1-6.911,0Zm-23.537-6.21a3.455,3.455,0,0,1,6.911,0v1.5a3.455,3.455,0,0,1-6.911,0Zm5.032,6.46.73.253-2.306,4-2.306-4,.73-.253Zm-9.739,6.028a5.263,5.263,0,0,1,3.534-4.968l.879-.3,3.1,5.379a.751.751,0,0,0,1.3,0l3.1-5.379.879.3a5.262,5.262,0,0,1,3.533,4.968v2.185H9.414ZM1.5,257.443H31.939a6.737,6.737,0,0,0-.489,2.522v2.185H1.5Zm47.776,4.707H32.952v-2.185A5.263,5.263,0,0,1,36.485,255l3.053-1.06h3.152L45.744,255a5.262,5.262,0,0,1,3.534,4.968Zm0,0" transform="translate(0.001 -213.3)" />
</svg>
',
            'accept'            => /*accept icon*/
                '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
    <g id="Group_1888" transform="translate(-752 -3333)">
        <line x2="4" y2="4" transform="translate(759.5 3344.5)" fill="none" stroke="#39ff00" stroke-linecap="round" stroke-width="3"/>
        <line id="Line_551" x1="7" y2="7" transform="translate(763.5 3341.5)" fill="none" stroke="#39ff00" stroke-linecap="round" stroke-width="3"/>
    </g>
    <path id="check-mark" d="M25.342,12.671A12.671,12.671,0,1,1,12.671,0,12.664,12.664,0,0,1,25.342,12.671Zm-1.98,0A10.691,10.691,0,1,0,12.671,23.362,10.685,10.685,0,0,0,23.362,12.671Zm0,0" fill="#5879bc"/>
</svg>
',
            'deny'              => /*deny icon*/
                '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"><g transform="translate(9 8.75)"><line x1="7" y1="7" fill="none" stroke="#e66c6c" stroke-linecap="round" stroke-width="3"/></g><g transform="translate(15.5 8.75)"><line x1="-7" y1="7" fill="none" stroke="#e66c6c" stroke-linecap="round" stroke-width="3"/></g><path d="M25.342,12.671A12.671,12.671,0,1,1,12.671,0,12.664,12.664,0,0,1,25.342,12.671Zm-1.98,0A10.691,10.691,0,1,0,12.671,23.362,10.685,10.685,0,0,0,23.362,12.671Zm0,0" fill="#5879bc"/></svg>',
            'footer_title_icon' =>
                '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="18.197" viewBox="0 0 21 18.197">
								<g id="Group_178" data-name="Group 178" transform="translate(-7375 1805)">
									<line id="Line_52" data-name="Line 52" y2="6" transform="translate(7376.5 -1800.5)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<line id="Line_53" data-name="Line 53" x2="4" y2="7" transform="translate(7376.5 -1794.5)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<line id="Line_54" data-name="Line 54" x1="5" y2="7" transform="translate(7380.5 -1794.5)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<line id="Line_55" data-name="Line 55" y2="7" transform="translate(7385.5 -1800.5)" fill="none" stroke="#50a8ea" stroke-width="1"></line>
									<line id="Line_56" data-name="Line 56" y2="6" transform="translate(7385.5 -1800.5)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<line id="Line_57" data-name="Line 57" x2="5" y2="7" transform="translate(7385.5 -1794.5)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<line id="Line_58" data-name="Line 58" x1="4" y2="7" transform="translate(7390.5 -1794.5)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<line id="Line_59" data-name="Line 59" y2="6.5" transform="translate(7394.5 -1801)" fill="none" stroke="#50a8ea" stroke-linecap="round" stroke-width="1"></line>
									<g id="Rectangle_459" data-name="Rectangle 459" transform="translate(7375 -1805)" fill="none" stroke="#50a8ea" stroke-width="1">
										<rect width="3" height="2" stroke="none"></rect>
										<rect x="0.5" y="0.5" width="2" height="1" fill="none"></rect>
									</g>
									<g id="Rectangle_460" data-name="Rectangle 460" transform="translate(7384 -1805)" fill="none" stroke="#50a8ea" stroke-width="1">
										<rect width="3" height="2" stroke="none"></rect>
										<rect x="0.5" y="0.5" width="2" height="1" fill="none"></rect>
									</g>
									<g id="Rectangle_461" data-name="Rectangle 461" transform="translate(7393 -1805)" fill="none" stroke="#50a8ea" stroke-width="1">
										<rect width="3" height="2" stroke="none"></rect>
										<rect x="0.5" y="0.5" width="2" height="1" fill="none"></rect>
									</g>
								</g>
							</svg>',

            'telegram'  => '<svg xmlns="http://www.w3.org/2000/svg" width="21.992" height="20.007" viewBox="0 0 21.992 20.007" class="fill-white"><path id="icons8-telegram-app-150" d="M24.576,6.277A1.533,1.533,0,0,0,23,6.158h0c-.641.257-18.137,7.762-18.85,8.068-.13.045-1.261.467-1.144,1.408a1.7,1.7,0,0,0,1.124,1.239L8.58,18.4c.3.982,1.383,4.607,1.624,5.381.15.483.395,1.117.823,1.247a1.022,1.022,0,0,0,.992-.178l2.72-2.522,4.39,3.424.1.063a2.114,2.114,0,0,0,.856.2,1.584,1.584,0,0,0,.606-.119,1.835,1.835,0,0,0,.948-.968L24.923,7.878A1.511,1.511,0,0,0,24.576,6.277ZM12.5,19.006l-1.5,4-1.5-5,11.5-8.5Z" transform="translate(-2.999 -6.002)"></path></svg>',
            'twitter'   => '<svg xmlns="http://www.w3.org/2000/svg" width="21.645" height="17.753" viewBox="0 0 21.645 17.753" class="fill-white"><path id="icons8-twitter-150" d="M14.8,5.469a4.7,4.7,0,0,0-4.692,4.692,4.6,4.6,0,0,0,.054.46,11.633,11.633,0,0,1-7.95-4.205.435.435,0,0,0-.374-.164.431.431,0,0,0-.343.218,4.594,4.594,0,0,0,.311,5.125c-.112-.049-.233-.076-.338-.135a.432.432,0,0,0-.635.379v.054a4.668,4.668,0,0,0,2.042,3.827.334.334,0,0,1-.041,0,.432.432,0,0,0-.487.554,4.7,4.7,0,0,0,3.245,3.069,8.084,8.084,0,0,1-4.151,1.149,8.124,8.124,0,0,1-.96-.054.433.433,0,0,0-.284.8,12.478,12.478,0,0,0,6.761,1.988,12.152,12.152,0,0,0,9.33-4.1,13.021,13.021,0,0,0,3.232-8.464c0-.123-.01-.243-.014-.365a9.063,9.063,0,0,0,2.055-2.15.433.433,0,0,0-.541-.636c-.223.1-.483.11-.717.189a4.592,4.592,0,0,0,.73-1.352.432.432,0,0,0-.635-.5,8.108,8.108,0,0,1-2.42.933A4.658,4.658,0,0,0,14.8,5.469Zm0,.865a3.831,3.831,0,0,1,2.8,1.217.436.436,0,0,0,.406.122,8.9,8.9,0,0,0,1.623-.487A3.852,3.852,0,0,1,18.52,8.2a.433.433,0,0,0,.284.811,8.94,8.94,0,0,0,1.23-.338,8.219,8.219,0,0,1-1.217,1.082.431.431,0,0,0-.176.379c.007.176.013.35.013.527a12.173,12.173,0,0,1-3.015,7.883,11.241,11.241,0,0,1-8.681,3.813A11.571,11.571,0,0,1,2.132,21.3,8.957,8.957,0,0,0,7,19.45a.433.433,0,0,0-.257-.771,3.79,3.79,0,0,1-3.259-2.028h.068A4.72,4.72,0,0,0,4.8,16.488a.433.433,0,0,0-.027-.838,3.8,3.8,0,0,1-2.961-3.123,4.594,4.594,0,0,0,1.366.284.433.433,0,0,0,.257-.8,3.831,3.831,0,0,1-1.7-3.191,3.759,3.759,0,0,1,.3-1.379,12.49,12.49,0,0,0,8.613,4.124.438.438,0,0,0,.355-.152.432.432,0,0,0,.091-.375,3.863,3.863,0,0,1-.108-.879A3.819,3.819,0,0,1,14.8,6.334Z" transform="translate(0.008 -5.469)"></path></svg>',
            'whatsapp'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20.366" height="20.366" viewBox="0 0 20.366 20.366" class="fill-white"><path id="icons8-whatsapp-150" d="M12.183,2A10.14,10.14,0,0,0,3.321,17.145L2.016,21.8a.443.443,0,0,0,.533.549l4.857-1.2A10.173,10.173,0,1,0,12.183,2Zm0,.885A9.3,9.3,0,1,1,7.65,20.3a.443.443,0,0,0-.323-.043L3.074,21.311l1.141-4.069A.443.443,0,0,0,4.17,16.9,9.3,9.3,0,0,1,12.183,2.885ZM8.483,6.87a1.408,1.408,0,0,0-1.022.464A3.448,3.448,0,0,0,6.427,9.789a5.221,5.221,0,0,0,1.157,2.937h0c-.012-.016.158.231.386.527a14.025,14.025,0,0,0,.944,1.1,10.253,10.253,0,0,0,3.314,2.406,15.77,15.77,0,0,0,1.531.559,4.081,4.081,0,0,0,1.844.118,3.113,3.113,0,0,0,1.16-.479,2.152,2.152,0,0,0,.956-1.036,3.652,3.652,0,0,0,.208-.911,2.089,2.089,0,0,0,0-.348.607.607,0,0,0-.1-.348c-.206-.338-.44-.347-.683-.468-.135-.067-.521-.255-.907-.439s-.72-.347-.926-.42A1.043,1.043,0,0,0,14.8,12.9a.881.881,0,0,0-.587.387c-.125.185-.628.778-.781.953l-.049-.025c-.19-.094-.421-.174-.764-.355A6.326,6.326,0,0,1,11.378,13h0a7.312,7.312,0,0,1-1.343-1.647c.01-.012,0,0,.021-.019h0c.158-.155.3-.341.416-.477a2.208,2.208,0,0,0,.322-.522.979.979,0,0,0-.022-.849h0c.006.013-.05-.112-.111-.255s-.138-.33-.221-.529c-.166-.4-.351-.844-.461-1.105h0a1.152,1.152,0,0,0-.534-.636.856.856,0,0,0-.44-.077H9C8.841,6.872,8.661,6.87,8.483,6.87Zm0,.885c.171,0,.339,0,.48.009s.136.008.108-.005.01-.017.093.178c.108.256.294.7.46,1.1.083.2.161.387.223.534s.1.229.135.307h0c.038.076.035.027.022.054a1.289,1.289,0,0,1-.2.34c-.144.166-.291.351-.368.427a.952.952,0,0,0-.267.374.856.856,0,0,0,.082.693,8.1,8.1,0,0,0,1.543,1.9,7.242,7.242,0,0,0,1.414.981c.393.207.714.329.785.364a.994.994,0,0,0,.572.124.862.862,0,0,0,.521-.291h0c.158-.179.627-.715.853-1.045.01,0,.006,0,.081.028h0c.034.012.462.2.844.386s.769.371.895.433c.182.09.267.148.29.149a1.038,1.038,0,0,1,0,.145,2.817,2.817,0,0,1-.158.687,1.67,1.67,0,0,1-.6.589,2.753,2.753,0,0,1-.817.351,3.173,3.173,0,0,1-1.449-.086,14.8,14.8,0,0,1-1.449-.528,9.463,9.463,0,0,1-3.02-2.2,13.16,13.16,0,0,1-.885-1.035c-.212-.276-.3-.42-.382-.521h0a4.783,4.783,0,0,1-.977-2.4,2.334,2.334,0,0,1,.8-1.852A.525.525,0,0,1,8.483,7.755Z" transform="translate(-2 -2)"></path></svg>',
            'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="20.5" height="20.5" viewBox="0 0 20.5 20.5" class="fill-white"><path id="icons8-instagram-64" d="M6.95,1A5.962,5.962,0,0,0,1,6.95v8.605A5.961,5.961,0,0,0,6.95,21.5h8.605A5.961,5.961,0,0,0,21.5,15.55V6.95A5.962,5.962,0,0,0,15.55,1Zm0,1.577h8.6A4.359,4.359,0,0,1,19.923,6.95v8.6a4.357,4.357,0,0,1-4.367,4.373H6.95a4.357,4.357,0,0,1-4.374-4.367V6.95A4.359,4.359,0,0,1,6.95,2.577ZM17.558,4.154a.788.788,0,1,0,.788.788A.786.786,0,0,0,17.558,4.154ZM11.25,5.731a5.519,5.519,0,1,0,5.519,5.519A5.534,5.534,0,0,0,11.25,5.731Zm0,1.577A3.942,3.942,0,1,1,7.308,11.25,3.93,3.93,0,0,1,11.25,7.308Z" transform="translate(-1 -1)"></path></svg>',

            'phone_call' => '<svg xmlns="http://www.w3.org/2000/svg" width="27.647" height="27.647" viewBox="0 0 27.647 27.647"><g id="_31_Call" data-name="31_Call" transform="matrix(0.974, 0.225, -0.225, 0.974, 4.945, -10.812)"><path id="Path_84" data-name="Path 84" d="M23.8,24.362a3.631,3.631,0,0,0-5.129,0h0a2.475,2.475,0,0,1-3.419,0l-3.419-3.419a2.417,2.417,0,0,1,0-3.419,3.633,3.633,0,0,0,0-5.129l-.855-.854a3.629,3.629,0,0,0-5.128,0,10.879,10.879,0,0,0,0,15.386l3.419,3.419a10.879,10.879,0,0,0,15.386,0,3.63,3.63,0,0,0,0-5.128Zm-.855,4.275a8.462,8.462,0,0,1-11.968,0L7.563,25.218a8.462,8.462,0,0,1,0-11.968,1.209,1.209,0,0,1,1.709,0l.855.854a1.211,1.211,0,0,1,0,1.71,4.834,4.834,0,0,0,0,6.838l3.419,3.419a4.951,4.951,0,0,0,6.838,0,1.209,1.209,0,0,1,1.709,0l.855.855a1.21,1.21,0,0,1,0,1.709Z" transform="translate(0)" fill="#9195a0"></path></g></svg>',
            'email'      => '<svg xmlns="http://www.w3.org/2000/svg" width="23.538" height="17.653" viewBox="0 0 23.538 17.653"><g id="_47_Mail" data-name="47_Mail" transform="translate(0 -8)"><path id="Path_285" data-name="Path 285" d="M18.634,8H4.9A4.909,4.909,0,0,0,0,12.9V20.75a4.909,4.909,0,0,0,4.9,4.9h13.73a4.909,4.909,0,0,0,4.9-4.9V12.9A4.909,4.909,0,0,0,18.634,8Zm2.942,12.75a2.945,2.945,0,0,1-2.942,2.942H4.9A2.945,2.945,0,0,1,1.961,20.75V12.9A2.945,2.945,0,0,1,4.9,9.961h13.73A2.945,2.945,0,0,1,21.576,12.9Z" fill="#9195a0"></path><path id="Path_286" data-name="Path 286" d="M22.605,24.039l2.852-3.8a.981.981,0,1,0-1.569-1.177l-4.707,6.277a2.943,2.943,0,0,1-4.709,0L9.766,19.059A.981.981,0,1,0,8.2,20.236l2.852,3.8L8.288,26.8a.981.981,0,1,0,1.387,1.387l2.562-2.562.667.889a4.9,4.9,0,0,0,7.846,0l.667-.889,2.563,2.563A.981.981,0,1,0,25.366,26.8Z" transform="translate(-5.058 -6.744)" fill="#9195a0"></path></g></svg>',

            'arrow_down'=>'<svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="12.207" viewBox="0 0 9.414 12.207"><g id="Group_217" data-name="Group 217" transform="translate(-557.793 -448)">
<line id="Line_81" data-name="Line 81" y2="11" transform="translate(562.5 448.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="1"/>
    <line id="Line_82" data-name="Line 82" x1="4" y2="4" transform="translate(562.5 455.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="1"/>
    <line id="Line_83" data-name="Line 83" x2="4" y2="4" transform="translate(558.5 455.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="1"/>
  </g>
</svg>
',
            'orderby'=>'<svg xmlns="http://www.w3.org/2000/svg" width="32.065" height="18.938" viewBox="0 0 32.065 18.938">
<g id="Group_1869" data-name="Group 1869" transform="translate(32.065 12.438) rotate(180)">
<line id="Line_49" data-name="Line 49" x2="23" transform="translate(0 10)" fill="none" stroke="#9195a0" stroke-width="3"></line>
<line id="Line_50" data-name="Line 50" x2="18.5" transform="translate(0 5)" fill="none" stroke="#9195a0" stroke-width="3"></line>
<line id="Line_51" data-name="Line 51" x2="14.5" fill="none" stroke="#9195a0" stroke-width="3"></line>
<line id="Line_95" data-name="Line 95" x2="10.5" transform="translate(0 -5)" fill="none" stroke="#9195a0" stroke-width="3"></line>
</g>
<path id="Path_427" data-name="Path 427" d="M14.94,18.09a1,1,0,0,1-.72-.3L10.69,14.2a1,1,0,1,1,1.43-1.41l2.82,2.88,2.82-2.88a1,1,0,1,1,1.41,1.42L15.63,17.8A1,1,0,0,1,14.94,18.09Z" transform="translate(-10.401 0.438)" fill="#9195a0"></path>
<path id="Path_428" data-name="Path 428" d="M15,18a1,1,0,0,1-1-1V.562a1,1,0,0,1,2,0V17A1,1,0,0,1,15,18Z" transform="translate(-10.401 0.438)" fill="#9195a0"></path>
</svg>',
        ];
    }
}
