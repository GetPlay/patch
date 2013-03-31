# HG changeset patch
# User DeathMetal
# Date 1362997769 -7200
# Node ID ef9a09455e697b094dab955effca90b4585d56fc
# Parent  9aa5e28b33f9e6c6d5e452a5727cade27174d5c9
Fixed "Player can't speak with you now."

diff --git a/src/server/game/Entities/Player/Player.cpp b/src/server/game/Entities/Player/Player.cpp
--- a/src/server/game/Entities/Player/Player.cpp
+++ b/src/server/game/Entities/Player/Player.cpp
@@ -20110,7 +20110,22 @@
       else if (rPlayer->isDND())
           ChatHandler(GetSession()).PSendSysMessage(LANG_PLAYER_DND, rPlayer->GetName().c_str(), rPlayer->autoReplyMsg.c_str());
    else if (!rPlayer->CanSpeak())
-  ChatHandler(GetSession()).PSendSysMessage(LANG_CANNOT_SPEAK, rPlayer->GetName().c_str(), rPlayer->autoReplyMsg.c_str());
+    {
+  uint64 muteTime = 0;
+  uint32 accId = rPlayer->GetSession()->GetAccountId();
+  PreparedStatement* stmt = LoginDatabase.GetPreparedStatement(LOGIN_SEL_PINFO);
+  stmt->setInt32(0, int32(realmID));
+  stmt->setUInt32(1, accId);
+  PreparedQueryResult result = LoginDatabase.Query(stmt);
+
+  if(result)
+  {
+   Field* fields = result->Fetch();
+   muteTime = fields[5].GetUInt64();
+   if(muteTime > 0)
+    ChatHandler(GetSession()).PSendSysMessage(LANG_CANNOT_SPEAK, secsToTimeString(muteTime - time(NULL), true).c_str());
+  }
+    }
   }
   void Player::PetSpellInitialize()
diff --git a/src/server/game/Miscellaneous/Language.h b/src/server/game/Miscellaneous/Language.h
--- a/src/server/game/Miscellaneous/Language.h
+++ b/src/server/game/Miscellaneous/Language.h
@@ -1164,6 +1164,7 @@
        // Use for custom patches             11000-11999
        LANG_AUTO_BROADCAST                 = 11000,
        LANG_INVALID_REALMID                = 11001,
+    LANG_CANNOT_SPEAK                   = 11002,
       
        // NOT RESERVED IDS                   12000-1999999999
        // `db_script_string` table index     2000000000-2000009999 (MIN_DB_SCRIPT_STRING_ID-MAX_DB_SCRIPT_STRING_ID)