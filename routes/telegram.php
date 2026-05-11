<?php

/** @var SergiX44\Nutgram\Nutgram $bot */

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Message\Message;

// $bot->onBusinessMessage(function (Nutgram $bot) {

//     $update = $bot->update();

//     // info(json_encode($update, JSON_PRETTY_PRINT));

//     $message = $update->business_message;

//     $bot->sendMessage(
//         text: 'Ishladi 🚀',
//         chat_id: $message->chat->id,
//         business_connection_id:
//         $message->business_connection_id
//     );
// });

// $bot->onBusinessMessage(function (Nutgram $bot) {

//     $update = $bot->update();

//     $message = $update->business_message;

//     // Safety check
//     if (!$message) {
//         return;
//     }

//     $text = mb_strtolower(trim($message->text ?? ''));

//     $chatId = $message->chat->id;

//     $businessConnectionId =
//         $message->business_connection_id;

//     // Logs
//     info('Business message received', [
//         'from' => $message->from?->username,
//         'text' => $text,
//     ]);

//     // Reply text
//     $reply = match (true) {

//         str_contains($text, 'salom') =>
//         "Assalomu alaykum 🙌",

//         str_contains($text, 'portfolio') =>
//         "GitHub:\nhttps://github.com/yourusername",

//         str_contains($text, 'xizmat') =>
//         "Xizmatlar:\n- Laravel Backend\n- Telegram Bot\n- API Integration",

//         str_contains($text, 'kurs') =>
//         "Kurslar tez orada 🚀",

//         str_contains($text, 'narx') =>
//         "Narx loyiha talabiga qarab belgilanadi 🙌",

//         default =>
//         "Xabaringiz qabul qilindi ✅\nTez orada javob beraman 🙌"
//     };

//     // Send reply
//     $bot->sendMessage(
//         text: $reply,
//         chat_id: $chatId,
//         business_connection_id:
//         $businessConnectionId
//     );
// });

$bot->onBusinessMessage(function (Nutgram $bot) {

    $message = $bot->update()->business_message;

    if (!$message) {
        return;
    }

    $text = trim($message->text ?? '');

    $chatId = $message->chat->id;

    $businessConnectionId =
        $message->business_connection_id;

    if ($text === '/hello') {

        // Delete command message
        $bot->deleteBusinessMessages(
            message_ids: [
                $message->message_id
            ],
            business_connection_id:
            $businessConnectionId
        );

        // Send new message
        $bot->sendMessage(
            text: 'Assalomu Alaykum 🙌',
            chat_id: $chatId,
            business_connection_id:
            $businessConnectionId
        );
    }
});