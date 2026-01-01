<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-white">Users Management</h2>
        <button onclick="openModal('User')"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm transition-all">+ Add
            User</button>
    </div>
    <div class="bg-[#111827] border border-gray-800 rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full text-left">
            <thead class="bg-gray-900/50 border-b border-gray-800">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase">Name/Email</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-gray-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                <tr class="hover:bg-gray-800/20 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-white">Admin User</div>
                        <div class="text-xs text-gray-500 font-mono">admin@site.com</div>
                    </td>
                    <td class="px-6 py-4"><span
                            class="px-2 py-1 bg-blue-500/10 text-blue-500 text-[10px] rounded border border-blue-500/20 uppercase font-bold">Admin</span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <button class="text-blue-500 text-xs hover:underline uppercase">Edit</button>
                        <button class="text-red-500 text-xs hover:underline uppercase">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
