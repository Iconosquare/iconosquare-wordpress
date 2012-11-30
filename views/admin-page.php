<div class='wrap' id="wrap-statigram">
    <div id="icon-themes" class="icon32"><br></div>
    <h2>Generate your Instagram widget</h2>
    <br>
    <div class="widget-liquid-left">
        <div id="widgets-left">
            <div class="widgets-holder-wrap">
                <div class="sidebar-name">
                    <h3>Settings</h3>
                </div>
                <div class="widget-holder">
                    <div class="content-column">
                        <form action="post" action="">
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <th scope="row"><label for="choose-content">Content</label></th>
                                        <td>
                                        <select name="choose-content" id="choose-content">
                                            <option selected="selected" value="myfeed">My Feed</option>
                                            <option value="hashtag">Hashtag</option>
                                        </select>
                                        </td>
                                    </tr>

                                    <tr valign="top" class="user-group">
                                        <th scope="row"><label for="username">Username</label></th>
                                        <td><input name="username" type="text" id="username" value="statigram" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top" class="user-group">
                                        <th scope="row">Informations</th>
                                        <td> <fieldset><legend class="screen-reader-text"><span>Show infos</span></legend><label for="infos">
                                        <input name="infos" type="checkbox" id="infos" checked="checked">
                                        Show infos</label>
                                        </fieldset></td>
                                    </tr>

                                    <tr valign="top" class="hash-group">
                                        <th scope="row"><label for="hashtag">Hashtag</label></th>
                                        <td><input name="hashtag" type="text" id="hashtag" value="statigram" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row"><label for="linking">Linking to</label></th>
                                        <td>
                                        <select name="linking" id="linking">
                                            <option selected="selected" value="statigram">Statigram</option>
                                            <option value="instagram">Instagram</option>
                                        </select>
                                        &nbsp; Choose where the link redirect
                                        </td>
                                    </tr>

                                    <tr valign="top"><td><hr/></td></tr>

                                    <tr valign="top">
                                        <th scope="row"><label for="width">Width (in pixels)</label></th>
                                        <td><input name="width" type="text" id="width" value="380" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row"><label for="height">Height (in pixels)</label></th>
                                        <td><input name="height" type="text" id="height" value="420" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top" class="mode-grid">
                                        <th scope="row"><label>Layout</label></th>
                                        <td>
                                            <select name="layoutX" id="layoutX">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3" selected="">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                            <span class="sep">X</span>
                                            <select name="layoutY" id="layoutY">
                                                <option value="1">1</option>
                                                <option value="2" selected="">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select> &nbsp;
                                            <span class="help-inline">Horizontal x Vertical</span>
                                        </td>
                                    </tr>

                                    <tr valign="top" class="mode-grid">
                                        <th scope="row"><label for="padding">Padding (in pixels)</label></th>
                                        <td><input name="padding" type="text" id="padding" value="10" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top" class="mode-slideshow">
                                        <th scope="row"><label for="pace">Transition between two pictures</label></th>
                                        <td><input name="pace" type="text" id="pace" value="10" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">Photo border</th>
                                        <td> <fieldset><legend class="screen-reader-text"><span>Border white with shadow</span></legend><label for="photo-border">
                                        <input name="photo-border" type="checkbox" id="photo-border" checked="checked">
                                        Border white with shadow</label>
                                        </fieldset></td>
                                    </tr>

                                    <tr valign="top"><td><hr/></td></tr>

                                    <tr valign="top" class="background">
                                        <th scope="row"><label for="background">Background color</label></th>
                                        <td><input name="background" type="text" id="background" value="FFFFFF" class="regular-text"><br> Leave empty for transparent</td>
                                    </tr>

                                    <tr valign="top" class="text">
                                        <th scope="row"><label for="text">Text color</label></th>
                                        <td><input name="text" type="text" id="text" value="777777" class="regular-text"></td>
                                    </tr>

                                    <tr valign="top" class="text">
                                        <th scope="row"><label for="text">Widget border</label></th>
                                        <td>
                                            <input name="widget-border" type="checkbox" id="widget-border" checked="checked">
                                            <input name="radius" type="radius" id="text" value="5" class="small-text">px (radius)
                                            <input name="border-color" type="text" id="border-color" value="DDDDDD" class="regular-text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p>
                        </form>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
    </div>

    <div class="widget-liquid-right">
        <div id="widgets-right">
            <div class="widgets-holder-wrap">
                <div class="sidebar-name">
                    <h3>Preview</h3>
                </div>
                <div class="widgets-sortables ui-sortable">
                    <div class="content-column">
                        <div id="statigram-iframe-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
