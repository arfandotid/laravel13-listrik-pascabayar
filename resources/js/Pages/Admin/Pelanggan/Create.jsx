import { Head, Link, useForm } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";

export default function PelangganCreate() {
    const { data, setData, post, processing, errors } = useForm({
        nama: "",
        email: "",
        username: "",
        password: "",
        no_kwh: "",
        alamat: "",
        tarif_id: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/admin/pelanggan");
    };

    return (
        <>
            <Head title={"Tambah Pelanggan"} />
            <LayoutApp>
                <PageHeader
                    title="Tambah Pelanggan"
                    description="Buat data pelanggan baru"
                />

                <form onSubmit={handleSubmit}>
                    <div className="space-y-5">
                        <Field>
                            <FieldLabel>Nama</FieldLabel>
                            <Input
                                type="text"
                                value={data.nama}
                                onChange={(e) =>
                                    setData("nama", e.target.value)
                                }
                                className={`${errors.nama ? "border-red-500" : ""}`}
                            />
                            {errors.nama && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.nama}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Email</FieldLabel>
                            <Input
                                type="text"
                                value={data.email}
                                onChange={(e) =>
                                    setData("email", e.target.value)
                                }
                                className={`${errors.email ? "border-red-500" : ""}`}
                            />
                            {errors.email && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.email}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Username</FieldLabel>
                            <Input
                                type="text"
                                value={data.username}
                                onChange={(e) =>
                                    setData("username", e.target.value)
                                }
                                className={`${errors.username ? "border-red-500" : ""}`}
                            />
                            {errors.username && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.username}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Password</FieldLabel>
                            <Input
                                type="password"
                                value={data.password}
                                onChange={(e) =>
                                    setData("password", e.target.value)
                                }
                                className={`${errors.password ? "border-red-500" : ""}`}
                            />
                            {errors.password && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.password}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>No kwh</FieldLabel>
                            <Input
                                type="text"
                                value={data.no_kwh}
                                onChange={(e) =>
                                    setData("no_kwh", e.target.value)
                                }
                                className={`${errors.no_kwh ? "border-red-500" : ""}`}
                            />
                            {errors.no_kwh && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.no_kwh}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Alamat</FieldLabel>
                            <Input
                                type="text"
                                value={data.alamat}
                                onChange={(e) =>
                                    setData("alamat", e.target.value)
                                }
                                className={`${errors.alamat ? "border-red-500" : ""}`}
                            />
                            {errors.alamat && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.alamat}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Tarif id</FieldLabel>
                            <Input
                                type="number"
                                value={data.tarif_id}
                                onChange={(e) =>
                                    setData("tarif_id", e.target.value)
                                }
                                className={`${errors.tarif_id ? "border-red-500" : ""}`}
                            />
                            {errors.tarif_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.tarif_id}
                                </FieldDescription>
                            )}
                        </Field>
                    </div>

                    <div className="flex justify-start space-x-2 pt-6">
                        <Button type="submit" disabled={processing}>
                            <Save />
                            {processing ? "Menyimpan..." : "Simpan"}
                        </Button>
                        <Link href="/admin/pelanggan">
                            <Button variant="outline">Batal</Button>
                        </Link>
                    </div>
                </form>
            </LayoutApp>
        </>
    );
}
