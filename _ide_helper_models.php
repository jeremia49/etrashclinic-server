<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $title
 * @property string $content
 * @property string $imgUrl
 * @property int $isVideo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $img_public_url
 * @property-read mixed $public_url
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereIsVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artikel whereUpdatedAt($value)
 */
	class Artikel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $fcmToken
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FCM newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FCM newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FCM query()
 * @method static \Illuminate\Database\Eloquent\Builder|FCM whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FCM whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FCM whereFcmToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FCM whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FCM whereUpdatedAt($value)
 */
	class FCM extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $title
 * @property string $content
 * @property string $imgUrl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $img_public_url
 * @property-read mixed $public_url
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Informasi whereUpdatedAt($value)
 */
	class Informasi extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $type
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $isRead
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $title
 * @property int $price
 * @property string $imgUrl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $img_public_url
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukHasil whereUpdatedAt($value)
 */
	class ProdukHasil extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $title
 * @property string $message
 * @property string $uniqid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QRList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QRList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QRList query()
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereUniqid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRList whereUpdatedAt($value)
 */
	class QRList extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user
 * @property int $qrid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog whereQrid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QRLog whereUser($value)
 */
	class QRLog extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property int $unitid
 * @property string|null $satuan
 * @property int|null $price
 * @property int $total
 * @property string $imgUrl
 * @property int $isApproved
 * @property int $isDeclined
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna query()
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereIsDeclined($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereUnitid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahPengguna whereUpdatedAt($value)
 */
	class SampahPengguna extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $author
 * @property string $title
 * @property string $satuan
 * @property int $rupiah
 * @property string $imgUrl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $img_public_url
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereRupiah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SampahUnitPrice whereUpdatedAt($value)
 */
	class SampahUnitPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $nohp
 * @property string $photoUrl
 * @property int $coinBalance
 * @property int $saldoBalance
 * @property string|null $remember_token
 * @property int $isAdmin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $totalSampahBulanIni
 * @property string|null $leagueBulanIni
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCoinBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLeagueBulanIni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSaldoBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTotalSampahBulanIni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

