<?php

class erLhcoreClassGenericBotActionProgress {

    public static function process($chat, $action, $trigger, $params = array())
    {
        $msg = new erLhcoreClassModelmsg();

        $metaMessage = array();

        if (isset($action['content']['method']) && !empty($action['content']['interval']) && $action['content']['interval'] > 0)
        {
            $handler = erLhcoreClassChatEventDispatcher::getInstance()->dispatch('chat.genericbot_handler', array(
                'render' => $action['content']['method'],
                'render_args' => $params,
                'chat' => & $chat
            ));

            // We have valid handler, so we have and function also
            if ($handler !== false && isset($handler['render']) && is_callable($handler['render']))
            {
                $action['content']['args'] = $handler['render_args'];
                $action['content']['method'] = $handler['render'];

                $metaMessage['content']['progress'] = $action['content'];

                $msg->msg = "";
                $msg->meta_msg = !empty($metaMessage) ? json_encode($metaMessage) : '';
                $msg->chat_id = $chat->id;
                $msg->name_support = erLhcoreClassGenericBotWorkflow::getDefaultNick($chat);
                $msg->user_id = -2;
                $msg->time = time() + 5;

                erLhcoreClassChat::getSession()->save($msg);
            }
        }

        return $msg;
    }
}

?>