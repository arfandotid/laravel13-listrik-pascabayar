import { Head, Link, usePage } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import hasAnyPermission from "@/Utils/Permission";
import { Edit } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import TableEmpty from "@/Shared/TableEmpty";
import Search from "@/Shared/Search";
import Delete from "@/Shared/Delete";
import { Button } from "@/Components/ui/button";
import TablePagination from "@/Shared/TablePagination";
import {
    Table,
    TableHeader,
    TableRow,
    TableHead,
    TableBody,
    TableCell,
} from "@/Components/BasicTable";

export default function RolesIndex() {
    const { roles } = usePage().props;

    return (
        <>
            <Head title={`Roles`} />
            <LayoutApp>
                {/* Header */}
                <PageHeader
                    showButton
                    title="Roles"
                    description="Kelola role dan hak akses pengguna"
                    action="/admin/roles/create"
                    actionText="Tambah Role"
                    permission="roles.create"
                />

                <div className="space-y-5">
                    <Search URL={"/admin/roles"} />

                    {/* Table */}
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Nama Role</TableHead>
                                <TableHead>Jumlah Permission</TableHead>
                                <TableHead className="w-7">Aksi</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {roles && roles.data.length > 0 ? (
                                roles.data.map((role, index) => (
                                    <TableRow key={role.id}>
                                        <TableCell className="font-medium">
                                            {++index +
                                                (roles.current_page - 1) *
                                                    roles.per_page}
                                        </TableCell>
                                        <TableCell>{role.name}</TableCell>
                                        <TableCell>
                                            {role.permissions_count}
                                        </TableCell>
                                        <TableCell>
                                            <div className="flex items-center space-x-2">
                                                {hasAnyPermission([
                                                    "roles.edit",
                                                ]) && (
                                                    <Link
                                                        href={`/admin/roles/${role.id}/edit`}
                                                        title="Edit"
                                                    >
                                                        <Button
                                                            size="icon"
                                                            variant="outline"
                                                        >
                                                            <Edit />
                                                        </Button>
                                                    </Link>
                                                )}
                                                {hasAnyPermission([
                                                    "roles.delete",
                                                ]) && (
                                                    <Delete
                                                        URL={"/admin/roles"}
                                                        id={role.id}
                                                    />
                                                )}
                                            </div>
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableEmpty
                                    title="Tidak ada Role"
                                    description="Silahkan tambahkan role baru"
                                    colSpan={4}
                                />
                            )}
                        </TableBody>
                    </Table>

                    {/* Pagination */}
                    <TablePagination links={roles.links} />
                </div>
            </LayoutApp>
        </>
    );
}
