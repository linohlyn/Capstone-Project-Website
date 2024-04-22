<section class="space-y-6">
    <div class="flex gap-x-12 gap-y-2 flex-col sm:flex-row sm:items-center overflow-x-scroll [&>*]:shrink-0">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
            <div class="h-32 rounded-lg bg-gray-200 lg:col-span-2"></div>
            <div class="h-32 rounded-lg bg-gray-200">
                <p>
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $comment->content }}</span>
                </p>
            </div>
          </div>
    </div>