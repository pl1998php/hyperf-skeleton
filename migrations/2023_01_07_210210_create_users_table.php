<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;
use App\Enum\DatabaseEnum;

class CreateUsersTable extends Migration
{
    protected string $connection = DatabaseEnum::SHOP_CONNECTION;

    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            //
            $table->bigIncrements('user_id');
            $table->string('nick_name',50)->comment('用户昵称');
            $table->string('name',50)->comment('用户昵称');
            $table->string('phone',11)->comment('用户电话');
            $table->string('avatar',100)->comment('用户头像');
            $table->string('password',100)->comment('用户密码');
            $table->string('wx_open_id',50)->comment('wx用户id');
            $table->string('wx_union_id',50)->comment('wx用户身份的唯一标识');
            $table->string('province',30)->nullable()->comment('用户省份');
            $table->string('city',30)->nullable()->comment('用户城市');
            $table->string('area',50)->nullable()->comment('用户区域');
            $table->tinyInteger('vip_level')->nullable()->default(0)->comment('vip等级: 0普通用户 1 vip用户');
            $table->integer('vip_end_time')->default(0)->nullable()->comment('vip过期时间');
            $table->string('login_ip',20)->nullable()->comment('用户最后一次登录ip');
            $table->integer('login_time')->nullable()->comment('用户最后一次登录时间');
            $table->decimal('balance',10)->default(0)->comment('账户余额');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
