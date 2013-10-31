
    <!--MODAL WINDOWS-->

    <div id="modal-ov">
      <div class="modal" id="usr-mod">
        <div class="mod-ttl"><h2>USER CONTROL PANEL</h2></div>
        <div class="mod-body">
          <div id="mod-home" class="nav-item show">
            <div class="av-overlay"></div>
            <img src="<?php echo $website['root']; ?>images/avatars/2d/<?php echo $account_extra['avatar']; ?>">
            <ul id="usr-det">
              <li><p><span>Name: </span><?php echo $account_extra['firstName'] . ' ' . $account_extra['lastName']; ?></p></li>
              <li><p><span>Role: </span>System Administrator</p></li>
              <li><p><span>Contact: </span><?php echo $login2['email']; ?></p></li>
              <li><p><span>Member since: </span><?php echo $joindate; ?></p></li>
              <li><p><span>Last IP: </span><?php echo $login2['last_ip']; ?></p></li>
            </ul>
          </div>
          <div id="mod-msg" class="mod-conv nav-item">
            <div class="scroll">
              <ul class="conv no-av scroll-cont">
                <span class="conv-info">Conversation with Mike - 9.20 AM</span>
                <li class="msg received">
                  <div class="message"><p><span class="msg-info">Mike, 1 hour ago</span>
                  Hey, can I borrow 6 grand til' tomorrow? Some mobster says he's going to cut off my toes if I don't pay him back. Thanks dude!</p></div>
                </li>
                <li class="msg sent">
                  <div class="message"><p><span class="msg-info">Sent 30 minutes ago</span>
                  Of course I'll lend you some money, I'm sure you'll pay me back. ;)</p></div>
                </li>
                <li class="msg received">
                  <div class="message"><p><span class="msg-info">Mobsters, 15 minutes ago</span>
                  We got your boy. If you want him to mooch off you ever again, bring $50,000
                  cash to the warehouse on 3rd and Lincoln. No cops.</p></div>
                </li>
              </ul>
              <form class="conv-text">
                <input type="text" class="conv-input" placeholder="Type in your message...">
                <button class="conv-btn">Send</button>
              </form>
            </div>
          </div>
          <div id="mod-notif" class="nav-item">
            <div class="notif green no-coll expanded full">
              Welcome to Flame Admin!<span class="icon">=</span>
              <p class="nt-det">Feel free to look around, there is much to see.</p>
            </div>
            <div class="notif red full">
              If a paperclip offers to help, please alert the authorities.
              <span class="icon">X</span>
            </div>
          </div>
          <div id="mod-set" class="nav-item">
            <input type="text" class="g4" placeholder="First name" value="<?php echo $account_extra['firstName']; ?>">
            <input type="text" class="g4" placeholder="Last name" value="<?php echo $account_extra['lastName']; ?>">
            <input type="text" class="g8 last" placeholder="E-mail" value="<?php echo $login2['email']; ?>">
            <button class="g8">Change Password</button>
            <button class="g8 last">Change Email</button>
            <div class="g8 cont">
              <input type="checkbox" class="chbox g4" checked>
              <div class="label g12 last"><span>Remember login details</span></div>
            </div>
            <div class="g8 cont last">
              <input type="checkbox" class="chbox g4" checked>
              <div class="label g12 last"><span>Toggle this checkbox</span></div>
            </div>
            <div class="g8 cont">
              <input type="checkbox" class="chbox tgcls g4" data-tgcls="#wrapper hz-nav">
              <div class="label g12 last"><span>Horizontal navigation</span></div>
            </div>
            <div class="g8 cont last">
              <input type="checkbox" class="chbox g4">
              <div class="label g12 last"><span>God Mode</span></div>
            </div>
          </div>
        </div>
        <div class="mod-act">
          <ul class="mod-nav">
            <li class="sel" data-nav="#mod-home"><span class="icon">H</span></li>
            <li data-nav="#mod-msg"><span class="icon">2</span></li>
            <li data-nav="#mod-notif">
              <span class="icon">A</span><div class="unread-ind">2</div>
            </li>
            <li data-nav="#mod-set"><span class="icon">U</span></li>
          </ul>
          <button class="orange close">Close</button>
        </div>
      </div>
    </div>